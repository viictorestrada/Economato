<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Recipe;
use App\Models\File;
use App\Models\Product;
use App\Models\RecipeHasProduct;
use App\Models\OrderRecipe;
use Barryvdh\DomPDF\Facade as PDF;
use Auth;



class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $filePopulationSpecial=File::where('characterization_id', 4)->pluck('file_number','id');
      $files=File::pluck('file_number','id');
      $recipes=Recipe::pluck('recipe_name','id');
      $product=Product::pluck('product_name','id');
      return view('orders.ordersconfirm', compact('files','recipes','product','filePopulationSpecial'));
    }

    public function getCharacterization(Request $request,$id){
      if($request->ajax()){
        $characterization = File::Characterization($id);
        return response()->json($characterization);
      }
    }


    public function pdfRemission($id)
    {

        // $products = Product::all();

        $information=array();


        $products = OrderRecipe::where('orders_recipes.order_id',$id)
        ->select('files.file_number','characterizations.characterization_name','programs.program_name','recipes.recipe_name','orders.order_date','orders.cost','orders_recipes.*','products.product_name','products_has_contracts.unit_price','taxes.tax','measure_unit.measure_name')
        ->join('orders', 'orders.id','=','orders_recipes.order_id')
        ->join('products','products.id','=','orders_recipes.product_id')
        ->join('measure_unit','products.id_measure_unit','=','measure_unit.id')
        ->join('products_has_contracts','products_has_contracts.products_id','=','products.id')
        ->join('taxes','taxes.id','=','products_has_contracts.taxes_id')
        ->join('recipes', 'recipes.id', '=' ,'orders.recipes_id')
        ->join('files' , 'files.id' , '=' , 'orders.files_id')
        ->join('programs','programs.id','=','files.program_id')
        ->join('characterizations','characterizations.id','=','files.characterization_id')
        ->get();
        $characterization_name=$products->pluck('characterization_name')->first();
        $program_name=$products->pluck('program_name')->first();
        $file_number=$products->pluck('file_number');
        $recipeName=$products->pluck('recipe_name')->first();
        $package_number=$products->pluck('package_number')->first();
        $orderCost = $products->pluck('cost');
        $information=[
          'name'=>Auth::user()->name,
          'last_name'=>Auth::user()->last_name,
          'date'=>date('y-m-d'),
          'recipe'=>$recipeName,
          'package_number'=>$package_number,
          'file_number'=>$file_number,
          'program_name'=>$program_name,
          'characterization_name'=>$characterization_name
        ];
        $pdf = PDF::loadView('reports.remission', compact('products','orderCost','information'));
        return $pdf->stream();
        //  return $pdf->download('Remisión.pdf');
        # Cargamos el contenido HTML.
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $rules = [
        'files_id' => 'required',
        'recipes_id' => 'required',
        'order_date' => 'required|date'
      ];

      $messages = [
        'files_id.required' => 'Debe seleccionar una ficha.',
        'recipes_id.required' => 'Debe seleccionar el taller.',
        'order_date.required' => 'La fecha es obligatoria.',
        'order_date.date' => 'el campo debe contener un formato de fecha'
      ];

      $this->validate($request,$rules,$messages);
      $createOrder=Order::create([
        'files_id' => $request['files_id'],
        'recipes_id' => $request['recipes_id'],
        'order_date' => $request['order_date'],
        'user_name' => Auth::user()->name.' '.Auth::user()->last_name
      ]);
      return redirect('orders')->with([swal()->autoclose(2000)->success('Solicitud Exitosa','Se realizo la solicitud')]);
    }

    public function updateStatus($id,$status){
      $validationModify=OrderRecipe::where('order_id', $id)->first();
      if($validationModify != null){
         $updateStatus=Order::findOrfail($id)->update(["status" => $status]);
          $array = array('status' => 'updateTrue' );
      }else{
          $array = array('status' => 'updateFalse');
      }
       return response()->json($array);
    }

}
