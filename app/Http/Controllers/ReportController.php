<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use DataTables;
use Auth;
use App\Models\Product;
use App\Models\Order;
use App\Models\ProductionOrders;
use App\Models\Budget;
use App\Models\ProductHasContracts;
use App\Models\AditionalBudget;
use App\Models\File;
use App\Models\Characterization;

class ReportController extends Controller
{



    public function index()
    {
        $totalBudgetChart=ReportController::totalBudget();
        $charTop=ReportController::topUsedProduct();
        $chartLess=ReportController::lessUsedProducts();
        $chartCharacterization=ReportController::reportCharacterization();
        return view('reports.administrator', compact('chartLess','chartCharacterization','totalBudgetChart','charTop'));
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
      $products=Product::where('products_has_contracts.status',1)->select('products.product_name','products_has_contracts.quantity')
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

    public function reportProducts(){
      $reportsProduct=Product::select('products.*','products_has_contracts.quantity','products_has_contracts.quantity_agreed')
      ->join('products_has_contracts', 'products.id' , '=' , 'products_has_contracts.products_id')
      ->where('products_has_contracts.status',1)
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
      $characterization=Order::where('orders.status',5)
      ->groupBy('characterizations.characterization_name','characterizations.id')
      ->join('files', 'orders.files_id', '=', 'files.id')
      ->join('characterizations' ,'characterizations.id', '=' , 'files.characterization_id')
      ->selectRaw('sum(cost) as sum,characterization_name,characterizations.id')
      ->orderBy('characterizations.id','asc')
      ->get();
      $characterizationSpecial=ProductionOrders::where('center_production_orders.status',5)
      ->groupBy('characterizations.characterization_name')
      ->join('characterizations' ,'characterizations.id', '=' , 'center_production_orders.characterizations_id')
      ->selectRaw('sum(cost) as sum,characterization_name')
      ->get();
      if(!$characterization->isEmpty() || !$characterizationSpecial->isEmpty()){
        $datasets=[
          0 => 0,
          1 => 0,
          2 => 0
        ];
        $labels=[];
        if (!$characterization->isEmpty()) {
          if ($characterization[0]['characterization_name'] == 'Negritudes' && $characterization[0]['characterization_name'] == 'Media Técnica') {
            $datasets[0] = 0;
            $datasets[1] = $characterization[0]->sum;
            $datasets[2] = $characterization[1]->sum;
          }
          else if ($characterization[0]['characterization_name'] == 'Negritudes') {
            $datasets[0] = 0;
            $datasets[1] = $characterization[0]->sum;
            $datasets[2] = 0;
        }
         else if ($characterization[0]['characterization_name'] == 'Media Técnica') {
            $datasets[0] = 0;
            $datasets[1] = 0;
            $datasets[2] = $characterization[0]->sum;
          }
          else {
           foreach($characterization as $key => $value ){
            $datasets[$key]=intval($value->sum);
        }
          }
        }
        if (!$characterizationSpecial->isEmpty()) {
          if ($characterizationSpecial[0]['characterization_name'] == 'Producción de Centro') {
            $datasets[3] = 0;
            $datasets[4] = $characterizationSpecial[0]->sum;
          }
          else {
            foreach ($characterizationSpecial as $key => $value) {
              $datasets[]=intval($value->sum);
            }
            if (count($datasets) == 4) {
              $datasets[4] = 0;
            }
          }
        }
        else {
          $datasets[3] = 0;
          $datasets[4] = 0;
        }
        $labels=[
          [
          "Formación = " .number_format($datasets[0])
          ],
          [
          "Negritudes = " .number_format($datasets[1])
          ],
          [
          "media técnica = " .number_format($datasets[2])
          ],
          [
          "Población especial = " .number_format($datasets[3])
          ],
          [
          "Producción de centro = " .number_format($datasets[4])
          ]
          ];
          $chartCharacterization = app()->chartjs
          ->name('pieChartBudget')
          ->type('pie')
          ->size(['width' => 400, 'height' => 200])
          ->labels($labels)
          ->datasets([
            [
            'backgroundColor' => ['#e80d05', '#f2a225','#0d9c88','#A569BD','#3498DB'],
            'hoverBackgroundColor' => ['#e80d05', '#f2a225','#0d9c88','#A569BD','#3498DB'],
            'data' => $datasets
            ],
          ])
          ->options([]);
                return $chartCharacterization;
          }else {

          }
    }


    public function totalBudget(){
      $aditions=0;
      $totalBudget=Budget::where('status',1)->first();
      if($totalBudget != null || $totalBudget>0){
        $sumAditions=AditionalBudget::where('budget_id', $totalBudget->id)->get();
      foreach($sumAditions as $key){
        $aditions=$key->sum('aditional_budget');
      }
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
      }else {
        return $totalBudget;
      }
    }

}
