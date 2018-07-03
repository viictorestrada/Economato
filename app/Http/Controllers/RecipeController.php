<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Recipe;
use DataTables;

class RecipeController extends Controller
{

    public function store(Request $request)
    {
      $rules = [
        'recipe_name' => 'required|string|max:45|unique:recipes'
      ];

      $messages = [
        'recipe_name.required' => 'El campo Nombre Receta es obligatorio.',
        'recipe_name.max' => 'El campo Nombre Receta de contener máximo 45 caracteres.',
        'recipe_name.unique' => 'EL nombre de la receta ya existe.'
      ];

      $this->validate($request, $rules, $messages);
      Recipe::create($request->all());
    }

    public function edit($id)
    {
      $recipe = Recipe::findOrFail($id);
      return $recipe;
    }

    public function recipesList(Request $request)
    {
      $recipes = Recipe::all();
      return DataTables::of($recipes)
      ->addColumn('action', function ($recipes) {
        $button = " ";
        if ($recipes->status == 1) {
          $button = '<a href="/recipes/status/'.$recipes->id.'/0" class="btn btn-md btn-danger"><i class="fa fa-ban"></i></a>  ';
        }
        else
        {
          $button = '<a href="/recipes/status/'.$recipes->id.'/1" class="btn btn-md btn-success"><i class="fa fa-check-circle"></i></a>  ';
        }
        return $button.'<a onclick="editRecipe('.$recipes->id.')" class="btn btn-md btn-info text-light"><i class="fa fa-edit"></i></a>';
      })->editColumn('status', function ($recipes) {
        return $recipes->status == 1 ? "Activo":"Inactivo";
      })
      ->make(true);
    }

    public function update(Request $request, $id)
    {
      $recipe = Recipe::findOrFail($id);
      $recipe->update($request->all());
      return $recipe;
    }

    public function status($id, $status)
    {
      $recipe = Recipe::findOrFail($id);
      if ($recipe == null) {
      return redirect('panel');
      }else {
      $recipe->update(["status"=>$status]);
      return redirect('panel')->with([swal()->autoclose(1500)->success('Cambio de estado', 'Se cambio el estado exitosamente')]);
    }
    }


}

