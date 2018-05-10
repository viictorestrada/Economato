<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\MeasureUnit;
use App\Models\ProductType;
use Illuminate\Http\Request;
use App\Http\Requests\saveProductRequest;
use App\Http\Requests\updateProductRequest;

class ProductController extends Controller
{

  public function index()
  {
    $products = Product::all();
    return view('products.index', compact('products'));
  }


  public function create()
  {
    $measure_unit = MeasureUnit::all();
    $product_types = ProductType::all();
    return view('products.create', compact('measure_unit', 'product_types'));
  }


  public function store(saveProductRequest $request)
  {
    Product::create($request->all());
    return redirect('products')->with([swal()->autoclose(1500)->success('Registro Éxitoso!', 'Se agrego un nuevo producto')]);
  }


  public function productsList(Product $product)
  {
    $products = Product::select('products.*','measure_unit.measure_name', 'product_type.product_type_name')->join('measure_unit', 'measure_unit.id', '=', 'products.id_measure_unit')->join('product_type', 'product_type.id', '=', 'products.id_product_type')->get();
    return DataTables::of($products)
    ->addColumn('action', function($id) {
      $boton=" ";
      if ($id->status == 1) {
        $boton = '<a href="/products/status/'.$id->id.'/0" class="btn btn-md btn-danger"><i class="fa fa-ban"></i></a>';
      }
      else
      {
        $boton = '<a href="/products/status/'.$id->id.'/1" class="btn btn-md btn-success"><i class="fa fa-check-circle"></i></a>';
      }
      return $boton.'  <a href="/products/'.$id->id.'/edit" class="btn btn-md btn-info"><i class="fa fa-edit"></i></a>';
    })->editColumn('status',function($id){
      return $id->status == 1 ? "Activo":"Inactivo";
    })
    ->make(true);
  }


  public function edit($id)
  {
    $measure_unit = MeasureUnit::all();
    $product_types = ProductType::all();
    $products = Product::find($product);
    return view('products.edit', compact('products','measure_unit', 'product_types'));
  }


  public function update(updateProductRequest $request, $id)
  {
    $product = Product::find($id);
    $product->update($request->all());
    return redirect('products')->with([swal()->autoclose(1500)->success('Actualización Exitosa!', 'Se actualizo el producto correctamente!')]);
  }

  public function status($id, $status)
  {
    $product = Product::find($id);
    if ($product == null) {
      alert()->autoclose(1500)->warning('Advertencia','No se encontraron datos!');
      return redirect('products');
    }else {
      $product->update(["status"=>$status]);
      return redirect('product')->with([swal()->autoclose(1500)->message('El usuario '.$product->product_name.' esta',''.$product->status == 1 ? "Activo":"Inactivo".'','success')]);
    }
  }

}
