<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\OrderRecipe;
use App\Models\ProductsHasContracts;
use App\Models\Order;
use App\Models\Product;
use App\Models\Budget;
use Barryvdh\DomPDF\Facade as PDF;
use DB;
// use App\Http\Controllers\OrderController;
class OrderRecipeController extends Controller
{

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
        $countValidationArrays=0;
        $costRecipe=0;
        $product_price=0;
        foreach($request['product_id']  as $key => $value){
          $quantityContract = ProductsHasContracts::where('products_id', $request['product_id'][$key])
          ->where('status',1)
          ->select('quantity')
          ->first();
          if($request['quantity'][$key]>0.0){
          if(( $request['quantity'][$key] * $request['package_number']) <= $quantityContract->quantity){
            $countValidationArrays +=1;
            $priceProduct=Product::where('products.id',$request['product_id'][$key])
            ->select('products.product_name','products_has_contracts.unit_price','taxes.tax')
            ->join  ('products_has_contracts', 'products.id', '=', 'products_has_contracts.products_id')
            ->join  ('taxes', 'taxes.id' , '=' , 'products_has_contracts.taxes_id')
            ->get()
            ->first();
            $product_price=(($priceProduct->unit_price*$priceProduct->tax)/100+$priceProduct->unit_price)*$request['quantity'][$key];
            $costRecipe +=$product_price;
          }else{
            $data = Product::findOrfail($request["product_id"][$key]);
            return redirect('panel')->with([swal()->autoclose(3500)->error('Producto agotado.','La cantidad de '.$data->product_name.' no se encuentran disponible en el contrato.')]);
         }
        }else{
          return redirect('panel')->with([swal()->autoclose(3500)->error('Cantidad erronea','Solicito un producto con una cantidad negativa.')]);
        }
        }
        $costOrder= $costRecipe*$request['package_number'];
        if ($countValidationArrays==count($request['product_id'])){
          foreach($request['product_id']  as $key => $value){
            // dd($request['quantity'][$key],$request['package_number']);
            $quantityAndPack=($request['quantity'][$key]*$request['package_number']);
            $createRecipeOrder = OrderRecipe::create([ 'recipe_id' => $request['recipe_id'],
              'product_id' => $request['product_id'][$key],
              'order_id' => $request['idOrder'],
              'quantity' => $request['quantity'][$key],
              'package_number' => $request['package_number'],
              'quantityAndPack' => $quantityAndPack]);
            }
            $order=Order::findOrfail($request['idOrder'])->update(['status' => '4', 'cost' => $costOrder]);
          }
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
        ->where('status',1)
        ->select('quantity')
        ->first();
        $result = $stockQuantity->quantity-$valueUpdate;
        $updateStock = ProductsHasContracts::where('products_id',$product_id)
        ->where('status',1)
        ->update(['quantity'=>$result]);

      });
      $updateStatus=Order::findOrfail($id)->update(["status" => '3']);

      return redirect('panel')->with([swal()->autoclose(1500)->success('Entrega exitosa.','La entrega ha sido exitosa.')]);
    }

    public function checkValue(Request $request){
      $valueCheck=0;
      $items = '';
      if($request['factura'] != null)
      foreach ($request['factura'] as $key => $value) {
         $costOrderRecipe=Order::whereid($request['factura'][$key])->value('cost');
        $valueCheck +=$costOrderRecipe;
      }else{
        return redirect('panel')->with([swal()->autoclose(3000)->warning('Seleccione las facturas.','No se encuentran facturas seleccionadas.')]);
      }
     $items=implode(", ", $request['factura']);
     Session::put('value', $valueCheck);
     Session::put('remission', $request['factura']);
    return redirect('panel')->with('message', 'El valor a facturar por las remisiones '. $items .' es: '.number_format($valueCheck).'');

    }

    public function update(Request $request){
      if(Session::has('value')){
        $budget=Budget::where('status', 1)->first();
        if($budget->budget >= Session::get('value')){
        $budgetUpdate=Budget::findOrfail($budget->id)->update(['budget' =>  $budget->budget-Session::get('value')]);
        if($budgetUpdate){
          foreach(Session::get('remission') as $remission){
            $remissionUpdate=Order::findOrfail($remission)->update(["status" => "5"]);
          }
          $format=Session::get('value');
          return redirect('panel')->with([swal()->autoclose(3000)->success('Facturación exitosa.','se ha facturado un total de: '.number_format($format))]);
        }
      }
      else{
        return redirect('panel')->With([swal()->autoclose(3000)->info('No hay presupuesto disponible para facturar el monto de las remisiones.')]);
      }
      }else{
        dd('no existe la session con los valores a requeridos'. Session::get('value'));
      }
    }


}
