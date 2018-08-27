<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderRecipe;
use App\Models\ProductsHasContracts;
use App\Models\Order;
use App\Models\Product;
use DB;
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
        echo "index";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "create";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // DB::transaction(function() use($request) {
        if($request['idOrder'] != null  ){
          $deleteDetails = OrderRecipe::where('order_id', '=' ,$request['idOrder'])->delete();
        }

        foreach($request['product_id']  as $key => $value){

          $quantityContract = ProductsHasContracts::where('products_id', $request['product_id'][$key])
          ->select('quantity')->first();

          if(( $request['quantity'][$key] * $request['package_number']) < $quantityContract->quantity){

          $createRecipeOrder = OrderRecipe::create([ 'recipe_id' => $request['recipe_id'],
          'product_id' => $request['product_id'][$key],
          'order_id' => $request['idOrder'],
          'quantity' =>$request['quantity'][$key],
          'package_number' => $request['package_number']]);
        }else{

          $data = Product::findOrfail($request["product_id"][$key]);
          return redirect('panel')->with([swal()->autoclose(3500)->error('Producto agotado.','La cantidad de '.$data->product_name.' no se encuentran disponible en el contrato.')]);
       }

      }
        $order=Order::findOrfail($request['idOrder'])->update(['status' => '0']);
      // });
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
        echo "hola";
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