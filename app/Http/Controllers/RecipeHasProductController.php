<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecipeHasProduct;

class RecipeHasProductController extends Controller
{
    public function store(Request $request)
    {
        
        $input = $request->all();
        $recipe_cost = 0;
        foreach ($input['product_id'] as $key => $value) {
            $recipe_cost = $recipe_cost + $input['quantity'][$key];
            RecipeHasProduct::create(['product_id'=>$value , 'quantity' =>$input['product_id'][$key], 'recipe_id' => $input['recipe_id'], 'recipe_cost' => $recipe_cost]);
        }
        return back()->with([swal()->autoclose(1500)->success('Registro Exitoso', 'Se ha agregado un nuevo registro!')]);
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }

    public function status(Type $var = null)
    {
    
    }
}
