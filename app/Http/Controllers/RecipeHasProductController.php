<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecipeHasProduct;
use App\Models\ProductsHasContracts;
use App\Models\Product;


class RecipeHasProductController extends Controller
{
    public function store(Request $request)
    {

        $input = $request->all();
        $recipe_cost = 0;
        foreach ($input['product_id'] as $key => $value) {
          $select = ProductsHasContracts::select('products_has_contracts.*')->where('products_has_contracts.products_id',$value)->get()->first();
          $measure = Product::measureUnit($value);
          $recipe_cost = $recipe_cost + $input['quantity'][$key]*$select->unit_price;
           RecipeHasProduct::create(['product_id'=>$value , 'quantity' =>$input['quantity'][$key], 'recipe_id' => $input['recipe_id'], 'recipe_cost' => $recipe_cost]);
        }
         return back()->with([swal()->autoclose(1500)->success('Registro Exitoso', 'Se ha agregado un nuevo registro!')]);
    }

    public function detailsShow($id)
    {
    
      
    }

    public function edit($id)
    {
      $recipe = RecipeHasProduct::select('recipes_has_products.*','products.product_name','measure_unit.measure_name')
      ->join('products','products.id', '=', 'recipes_has_products.product_id')
      ->join('measure_unit','measure_unit.id', '=' , 'products.id_measure_unit')
      ->where('recipes_has_products.recipe_id',$id)->get()->all();
      
       return $recipe;
    }

    public function update(Request $request, $id)
    {

    }

    public function status(Type $var = null)
    {

    }
}
