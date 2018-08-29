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
    $requestInstructor=Order::where('orders.status' ,'=', '1')
    ->orWhere('orders.status' ,'=', '2')
    ->orWhere('orders.status' ,'=', '4')
    ->select('orders.*','recipes.recipe_name','files.file_number','programs.program_name')
    ->join('recipes', 'orders.recipes_id','=','recipes.id')
    ->join('files', 'orders.files_id' , '=' , 'files.id')
    ->join('programs' , 'files.program_id', '=' ,'programs.id')
    ->get();
    return DataTables::of($requestInstructor)
    ->addColumn('action', function ($id) {
      if ($id->status == 1 || $id->status== 4) {
        $bot = '<a onclick="modalEditOrder('.$id->recipes_id.' , '.$id->id.')" data-toggle="tooltip" title="Modificar taller solicitado" class="btn btn-md btn-outline-info text-info"><i class="fa fa-edit"></i></a>
        <a onclick="managmentOrder('.$id->id.', 2 )" data-outline-toggle="tooltip" title="Aprobar solicitud de taller." class="btn btn-md btn-outline-success text-success"><i class="fa fa-check-circle"></i></a>
         <a  onclick="managmentOrder('.$id->id.', 0 )" class="btn btn-md btn-outline-danger text-danger" data-toggle="tooltip" title="Cancelar solicitud de taller."><i class="fa fa-ban"></i></a>';
         return $bot;
      }
      else if ($id->status == 2)
      {
        $bot = '<a href="pdf/products/'.$id->id.'" class="btn btn-outline-danger" data-toggle="tooltip" title="Descargar orden." style="text-decoration : none;"><i class="far fa-file-pdf "></i>
        </a>
        <a href="/orderRecipeEdit/updateQuantity/'.$id->id.'"  class="btn btn-md btn-outline-info text-info" data-toggle="tooltip" title="Entregar Solicitud" ><i class="fa fa-arrow-right"></i></a>';
        return $bot;
      }
    })->editColumn('status', function ($id) {
      if($id->status==1){
        return "Solicitado";
      }else if($id->status==2){
        return  "Pedido proveedor";
      }else if($id->status==4){
        return "Modificado";
      }
    })
    ->make(true);
  }

  public function requestTableFinished(){
    $requestInstructor=Order::where('orders.status' ,'=', '3')
    ->orWhere('orders.status' ,'=', '0')
    ->select('orders.*','recipes.recipe_name','files.file_number','programs.program_name')
    ->join('recipes', 'orders.recipes_id','=','recipes.id')
    ->join('files', 'orders.files_id' , '=' , 'files.id')
    ->join('programs' , 'files.program_id', '=' ,'programs.id')
    ->get();
    return DataTables::of($requestInstructor)
    ->addColumn('action' , function($id){
     if(  $id->status==0){
        $bot = '<a class="btn btn-md btn-outline-info text-info" data-toggle="tooltip" title="Solicitud rechazada.">Rechazado</i></a>';
        return $bot;
      }
      else if(  $id->status==3){
        $bot = '<a class="btn btn-md btn-outline-info text-info" data-toggle="tooltip" title="Solicitud entregada.">Entregado</i></a>';
        return $bot;
      }
    })->editColumn('status', function ($id) {
      if($id->status==3){
        return "Entregado";
      }else if($id->status==0){
        return "Cancelado";
      }
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
