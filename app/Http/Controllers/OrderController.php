<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Recipe;
use App\Models\File;
use App\Models\Product;
use App\Models\RecipeHasProduct;
use App\Models\OrderRecipe;
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
      $files=File::pluck('file_number','id');
      $recipes=Recipe::pluck('recipe_name','id');
      $product=Product::pluck('product_name','id');
      return view('orders.ordersconfirm', compact('files','recipes','product'));
    }

    public function getCharacterization(Request $request,$id){
      if($request->ajax()){
        $characterization = File::Characterization($id);
        return response()->json($characterization);
      }
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
