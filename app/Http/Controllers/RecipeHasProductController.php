<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecipeHasProduct;
use App\Models\ProductsHasContracts;
use App\Models\Product;
use App\Models\Recipe;
use App\Models\Order;
use App\Models\OrderRecipe;

class RecipeHasProductController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->all();
        if ($input['product_id'][0] == null || $input['quantity'][0] == null) {
            return back()->with([swal()->autoclose(1500)->error('Registro fallido', 'No se pudo agregar la receta!')]);
        }
        else{
        if ($input['recipe_id'] != null) {
            $recipe = RecipeHasProduct::where('recipe_id', $input['recipe_id'])->delete();
        }
        $recipe_cost = 0;
        foreach ($input['product_id'] as $key => $value) {
          $select = ProductsHasContracts::where('products_has_contracts.products_id',$value)->
          select('products_has_contracts.*','taxes.tax')
          ->join ('taxes', 'taxes.id' , '=' , 'products_has_contracts.taxes_id')
          ->get()->first();
          $measure = Product::measureUnit($value);
          $recipe_cost = $recipe_cost + $input['quantity'][$key] * ( $select->unit_price + (($select->unit_price*$select->tax)/100) );
          RecipeHasProduct::create(['recipe_id' => $input['recipe_id'], 'product_id'=>$value , 'quantity' =>$input['quantity'][$key]]);
        }
        $updateRecipeCost=Recipe::where('id',$input['recipe_id'])->update(['recipes_cost' => $recipe_cost]);
         return back()->with([swal()->autoclose(1500)->success('Registro Exitoso', 'Se ha agregado una nueva receta.')]);
        }
    }

    public function edit(Request $request,$id)
    {
      $recipe = RecipeHasProduct::select('recipes_has_products.*','taxes.tax','products.product_name',
      'measure_unit.measure_name','products_has_contracts.unit_price','recipes.recipes_cost')
      ->join('products','products.id', '=', 'recipes_has_products.product_id')
      ->join('products_has_contracts', 'products.id', '=' , 'products_has_contracts.products_id')
      ->join('taxes', 'taxes.id' , '=' , 'products_has_contracts.taxes_id' )
      ->join('measure_unit','measure_unit.id', '=' , 'products.id_measure_unit')
      ->join('recipes','recipes.id', '=' , 'recipes_has_products.recipe_id')
      ->where('recipes_has_products.recipe_id',$id)->get();
      return $recipe;

    }


    public function show(Request $request,$id,$order){
      $status=Order::findOrfail($order);
       if ($status->status == 1 )
       {
          $recipe=RecipeHasProductController::edit($request,$id);
        }
        else if($status->status==4)
        {
          $recipe = OrderRecipe::select('orders_recipes.*','products.product_name','measure_unit.measure_name','orders_recipes.quantity')
          ->join('products','products.id', '=', 'orders_recipes.product_id')
          ->join('measure_unit','measure_unit.id', '=' , 'products.id_measure_unit')
          ->join('recipes','recipes.id', '=' , 'orders_recipes.recipe_id')
          ->where('orders_recipes.order_id',$order)
          ->get()->all();
       }
       return $recipe;

    }


}
