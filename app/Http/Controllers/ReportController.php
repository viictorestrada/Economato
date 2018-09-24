<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use DataTables;
use Auth;
use App\Models\Product;
use App\Models\Budget;
use App\Models\ProductHasContracts;
use App\Models\AditionalBudget;
class ReportController extends Controller
{



    public function index()
    {
        $totalBudgetChart=ReportController::totalBudget();
        $charTop=ReportController::topUsedProduct();
        $chartLess=ReportController::lessUsedProducts();
        $chart = app()->chartjs
        ->name('pieChartBudget')
        ->type('pie')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['Caracterización x', 'Caracterización x','Caracterización x','Caracterización x','Caracterización x'])
        ->datasets([
            [
                'backgroundColor' => ['#e80d05', '#f2a225','#98c238','#0d9c88','#174d69'],
                'hoverBackgroundColor' => ['#e80d05', '#f2a225','#98c238','#0d9c88','#174d69'],
                'data' => [30, 40,54,45,56]
            ]
        ])
        ->options([]);
        return view('reports.administrator', compact('chartLess','chart','totalBudgetChart','charTop'));
    }

    public function totalBudget(){
      $sumAditions=AditionalBudget::get();
      foreach($sumAditions as $key){
        $aditions=$key->sum('aditional_budget');
      }
      // dd($aditions);
      $totalBudget=Budget::select('budget.*')->first();
      $averageBudget=(round((($totalBudget->budget/$totalBudget->initial_budget)*100),2));
      $initial=100-round((($totalBudget->budget/($totalBudget->initial_budget+$aditions))*100),2);
      $totalBudgetChart = app()->chartjs
      ->name('doughnutChartTest')
      ->type('doughnut')
      ->size(['width' => 400, 'height' => 200])
      ->labels(['Presupuesto Consumido = '.number_format(($totalBudget->initial_budget+$aditions)-$totalBudget->budget).' ', 'Presupuesto disponible = '.number_format($totalBudget->budget).''])
      ->datasets([
          [
              'backgroundColor' => ['#17A2B8', '#DCE7E9' ],
              'hoverBackgroundColor' => ['#17A2B8', '#DCE7E9' ],
              'data' => [$initial, $averageBudget]
          ]
      ]);
            return $totalBudgetChart;
    }

    public function lessUsedProducts(){
      $products=Product::select('products.product_name','products_has_contracts.quantity')
      ->join('products_has_contracts', 'products.id' , '=' ,'products_has_contracts.products_id')
      ->orderBy('quantity', 'desc')
      ->take(10)
      ->get();
      $data=array();
      $product_name[]=[];
      foreach($products as $key=>$product){
      $data[$key]=$product->quantity;
      $product_name[$key]=$product->product_name;
      }
      $chartjs=app()->chartjs
      ->name('lineChartlessUsedProducts')
      ->type('horizontalBar')
      ->size(['width' => 600, 'height' => 300])
      ->labels($product_name)
      ->datasets([
        [
          "label" => 'Productos menos usados',
          "borderColor" => "rgb(23, 162,184, 1)",
          "backgroundColor" => "rgb(23, 162,184, 0.5)",
          "fill" => false,
          "strokecolor" => "rgb(23, 162,184, 0.5)",
        'data' => $data,
        ]
      ])
      ->options([]);

      return $chartjs;
    }

    public function topUsedProduct(){
      $products=Product::select('products.product_name','products_has_contracts.quantity')
      ->join('products_has_contracts', 'products.id' , '=' ,'products_has_contracts.products_id')
      ->orderBy('quantity', 'asc')
      ->take(10)
      ->get();
      $data=array();
      $product_name[]=array();
      foreach($products as $key=>$product){
      $data[$key]=$product->quantity;
      $product_name[$key]=$product->product_name;
      }
      $charTop=app()->chartjs
      ->name('lineCharttopUsedProduct')
      ->type('horizontalBar')
      ->size(['width' => 600, 'height' => 300])
      ->labels($product_name)
      ->datasets([
        [
        "label" => 'Productos más usados',
        "borderColor" => "rgb(23, 162,184, 1)",
        "backgroundColor" => "rgb(23, 162,184, 0.5)",
        "fill" => false,
        "strokecolor" => "rgb(23, 162,184, 0.5)",
        "pointHoverBackgroundColor" => "#fff",
        "pointHoverBorderColor" => "rgba(220,220,220,1)",
        'data' => $data,
        ]
      ])
      ->options ([]);

      return $charTop;
    }


    public function pdf()
    {

        $products = Product::all();

        $pdf = PDF::loadView('pdf.products', compact('products','information'));

        return $pdf->download('listado.pdf');
    }

    public function reportProducts(){
      $reportsProduct=Product::select('products.*','products_has_contracts.quantity','products_has_contracts.quantity_agreed')
      ->join('products_has_contracts', 'products.id' , '=' , 'products_has_contracts.products_id')
      ->get();
      return DataTables::of($reportsProduct)
      ->addColumn('action', function($reportsProduct) {
        if((($reportsProduct->quantity/$reportsProduct->quantity_agreed)*100)<20)
        $bot=' <div class="progress">
        <div class="progress-bar   bg-danger" role="progressbar" style="background:#e80d05 !important; width:'.(($reportsProduct->quantity/$reportsProduct->quantity_agreed)*100).'%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">'.(($reportsProduct->quantity/$reportsProduct->quantity_agreed)*100).'%</div>
        </div>';
        else if((($reportsProduct->quantity/$reportsProduct->quantity_agreed)*100)>20 && (($reportsProduct->quantity/$reportsProduct->quantity_agreed)*100)<70){
          $bot=' <div class="progress">
          <div class="progress-bar  bg-warning" role="progressbar" style="background:#f2a225 !important; width:'.(($reportsProduct->quantity/$reportsProduct->quantity_agreed)*100).'%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">'.(($reportsProduct->quantity/$reportsProduct->quantity_agreed)*100).'%</div>
          </div>';
        }else if((($reportsProduct->quantity/$reportsProduct->quantity_agreed)*100)>70){
          $bot=' <div class="progress">
          <div class="progress-bar   bg-success" role="progressbar" style="background:#0d9c88 !important; width:'.(($reportsProduct->quantity/$reportsProduct->quantity_agreed)*100).'%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">'.(($reportsProduct->quantity/$reportsProduct->quantity_agreed)*100).'%</div>
          </div>';
        }
        return $bot;
      })->editColumn('quantity', function($reportsProduct){
        return number_format($reportsProduct->quantity);
      })->editColumn('quantity_agreed',function($reportsProduct){
        return number_format($reportsProduct->quantity_agreed);
      })
      ->make(true);
    }


    public function reportCharacterization (){
      // SELECT  `order_id`, `quantity`, cost, c.characterization_name,`package_number` FROM `orders_recipes` ore
      // join orders o on ore.order_id=o.id join files f on f.id=o.files_id
      // join characterizations c on c.id=f.characterization_id where o.status=5 GROUP BY c.characterization_name
    }

}
