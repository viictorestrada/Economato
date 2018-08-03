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
use App\Models\Order;
use DataTables;

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
    $product=Product::select('products.id','products.product_name')
    ->join('products_has_contracts','products.id' , '=' , 'products_has_contracts.products_id')->get();
    $products = $product->pluck('product_name', 'id');

    return view('administrator.panel', compact('recipe','products'));
  }

  public function requestTable()
  {
    $requestInstructor=Order::select('orders.*','recipes.recipe_name','files.file_number','programs.program_name')
    ->join('recipes', 'orders.recipes_id','=','recipes.id')
    ->join('files', 'orders.files_id' , '=' , 'files.id')
    ->join('programs' , 'files.program_id', '=' ,'programs.id')
    ->get();
    return DataTables::of($requestInstructor)
    ->addColumn('action', function ($id) {
      if ($id->status == 1) {
        $bot = '<a onclick="modalEditOrder('.$id->recipes_id.')" class="btn btn-md btn-info text-light"><i class="fa fa-edit"></i></a> <a href="/users/status/'.$id->id.'/1" class="btn btn-md btn-success"><i class="fa fa-check-circle"></i></a> <a href="/users/status/'.$id->id.'" class="btn btn-md btn-danger"><i class="fa fa-ban"></i></a>';
      }
      else if ($id->status == 2)
      {
        $bot = '<a onclick="modalEditOrder('.$id->recipes_id.')" class="btn btn-md btn-info text-light"><i class="fa fa-arrow-right"></i></a>';
      }
      else if ($id->status == 3) {

      }
      else if ($id->status == 0) {

      }
      return $bot;
    })->editColumn('status', function ($id) {
      return $id->status == 1 ? "Activo":"Inactivo";
    })
    ->make(true);
  }

  public function getMeasure(Request $request, $id)
  {
    if($request->ajax()){
      $measureUnit = Product::measureUnit($id);
      return response()->json($measureUnit);
    }
  }

}
