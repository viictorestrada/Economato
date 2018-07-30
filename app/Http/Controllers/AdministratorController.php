<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Complex;
use App\Models\Program;
use App\Models\Characterization;
use App\Models\Competence;
use App\Models\Location;
use App\Models\Recipe;
use App\Models\Product;
use App\Models\RecipeHasProduct;

class AdministratorController extends Controller
{

  public function configurations()
  {
    $region = Region::all();
    $program = Program::all();
    $characterization = Characterization::all();
    $competence = Competence::all();
    $complex = Complex::all();
    $location = Location::all();

    return view('configurations.index', compact('region','program','characterization','competence', 'complex', 'location','recipe','product'));
  }

  public function panel()
  {
    $recipe = Recipe::all();
    $product = Product::pluck('product_name', 'id');

    return view('administrator.panel', compact('recipe','product'));
  }

  public function getMeasure(Request $request, $id)
  {
    if($request->ajax()){
      $measureUnit = Product::measureUnit($id);
      return response()->json($measureUnit);
    }
  }

}
