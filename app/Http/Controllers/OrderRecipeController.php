<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderRecipe;
use App\Models\ProductsHasContracts;
use App\Models\Order;

// use App\Http\Controllers\OrderController;
class OrderRecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      foreach($request['product_id']  as $key => $value){
        $createRecipeOrder=OrderRecipe::create([ 'recipe_id' => $request['recipe_id'],
        'product_id' => $request['product_id'][$key],
        'order_id' => $request['idOrder'],
        'quantity' =>$request['quantity'][$key],
        'package_number' => $request['package_number']]);
      }
        return redirect('panel')->with([swal()->autoclose(1500)->success('Receta Modificada','La receta fue modificada con exito.')]);

    }

    public function updateQuantity($id){

      $quantity = OrderRecipe::select('quantity','product_id','package_number')
      ->where('order_id',$id)
      ->get();

      $sum = $quantity->groupBy('product_id')->each(function ($key) {
        $product_id = $key[0]["product_id"];
        $valueUpdate = $key->sum('quantity')*$key[0]["package_number"];
        $stockQuantity = ProductsHasContracts::where('products_id',$product_id)
        ->select('quantity')
        ->first();
        $result = $stockQuantity->quantity-$valueUpdate;
        $updateStock = ProductsHasContracts::where('products_id',$product_id)
        ->update(['quantity'=>$result]);

      });
      $updateStatus=Order::findOrfail($id)->update(["status" => '3']);

      return redirect('panel')->with([swal()->autoclose(1500)->success('Entrega exitosa.','La entrega ha sido exitosa.')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "ingreso show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      echo "ingreso edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo "ingreso destroy";
    }
}
