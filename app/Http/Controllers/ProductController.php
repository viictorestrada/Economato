<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\MeasureUnit;
use App\Models\ProductType;
use App\Models\Presentation;
use Illuminate\Http\Request;
use App\Http\Requests\saveProductRequest;
use App\Http\Requests\updateProductRequest;
use DataTables;
use App\Exports\ProductExport;
use App\Imports\ProductImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{

  public function index()
  {
    $products = Product::all();
    return view('products.index', compact('products'));
  }

  public function create()
  {
    $measure_unit = MeasureUnit::pluck('measure_name', 'id');
    $product_types = ProductType::pluck('product_type_name', 'id');
    $presentations = Presentation::pluck('presentation', 'id');
    return view('products.create', compact('measure_unit', 'product_types', 'presentations'));
  }


  public function store(saveProductRequest $request)
  {
    Product::create($request->all());
    return redirect('products')->with([swal()->autoclose(1500)->success('Registro Éxitoso!', 'Se agrego un nuevo producto')]);
  }


  public function productsList(Request $request)
  {
    $products = Product::select('products.*', 'measure_unit.measure_name', 'product_type.product_type_name', 'presentations.presentation')
    ->join('measure_unit', 'measure_unit.id', '=', 'products.id_measure_unit')
    ->join('product_type', 'product_type.id', '=', 'products.id_product_type')
    ->join('presentations', 'presentations.id', '=', 'products.presentation_id')->get();
    return DataTables::of($products)
    ->addColumn('action', function ($id) {
      $button=" ";
      if ($id->status == 1) {
        $button = '<a href="/products/status/'.$id->id.'/0" class="btn btn-md btn-outline-danger"><i class="fa fa-ban"></i></a>';
      }
      else
      {
        $button = '<a href="/products/status/'.$id->id.'/1" class="btn btn-md btn-outline-success"><i class="fa fa-check-circle"></i></a>';
      }
      return $button.' <a href="/products/'.$id->id.'/edit" class="btn btn-md btn-outline-info"><i class="fa fa-edit"></i></a>';
    })->editColumn('status', function ($id) {
      return $id->status == 1 ? "Activo" : "Inactivo";
    })
    ->make(true);
  }


  public function edit($id)
  {
    $measure_unit = MeasureUnit::pluck('measure_name', 'id');
    $product_types = ProductType::pluck('product_type_name', 'id');
    $presentations = Presentation::pluck('presentation', 'id');
    $products = Product::findOrFail($id);
    return view('products.edit', compact('products', 'measure_unit', 'product_types', 'presentations'));
  }


  public function update(updateProductRequest $request, $id)
  {
    Product::findOrFail($id)->update($request->all());
    return redirect('products')->with([swal()->autoclose(1500)->success('Actualización Exitosa!', 'Se actualizo el producto correctamente!')]);
  }

  public function status($id, $status)
  {
    $product = Product::findOrFail($id);

    $product->update(["status"=>$status]);
    return redirect('products')->with([swal()->autoclose(1500)->message('El Producto '.$product->product_name.' esta',''.$product->status == 1 ? "Activo" : "Inactivo".'', 'success')]);
  }

      public function export()
    {
        return Excel::download(new ProductExport, 'product.xlsx');
    }

      public function import(Request $request)
    {
      $file = $request->file('productsImport');
      $nombre = $file->getClientOriginalName();


 Excel::import(new ProductImport,  $request->file('productsImport'));
      return redirect('products');
    }

}
