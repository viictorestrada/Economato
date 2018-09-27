<?php

namespace App\Http\Controllers;

use App\Models\ProductionHasProducts;
use App\Models\ProductionOrders;
use App\Models\ProductsHasContracts;
use App\Models\filesHasProductions;
use Illuminate\Http\Request;

class ProductionHasProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request["product_id"][0] == "") {
        return back()->with([swal()->autoclose(1500)->error('Modificación fallida','Debe llenar todos los campos y elegir una ficha')]);
    }
    else {
        ProductionHasProducts::where('center_production_orders_id', $request['center_production_orders_id'])->delete();
        $center_id = $request['center_production_orders_id'];
        $cost = 0;
        foreach ($request['product_id'] as $key => $value) {
            $select = ProductsHasContracts::select('products_has_contracts.unit_price','taxes.tax')->where('products_has_contracts.products_id',$value)->
                join('taxes','taxes.id', '=' , 'products_has_contracts.taxes_id')->get()->first();
                $cost += $request['quantity'][$key]*($select->unit_price+($select->unit_price*$select->tax)/100);
            $storePHP = ProductionHasProducts::create([
                'center_production_orders_id' => $center_id,
                'products_id' => $value,
                'quantity' => $request['quantity'][$key]
                ]);
        }
        ProductionOrders::where('id',$request['center_production_orders_id'])->update(['cost'=> $cost, 'status' => 2]);
        filesHasProductions::where('center_production_orders_id', $request['center_production_orders_id'])->delete();
        if ($request->has('files_id')) {
            foreach ($request['files_id'] as $key => $value) {
                filesHasProductions::create([
                    'center_production_orders_id' => $request['center_production_orders_id'],
                    'files_id' => $value
                ]);
        } 
        }
        return back()->with([swal()->autoclose(1500)->success('Modificación exitosa!','Se ha modificado el pedido con exito')]);
        
    }

        
    }

    public function ajaxModal(Request $request, $id)
    {
        
          $recipe = ProductionHasProducts::select('center_production_has_products.*','products.product_name','measure_unit.measure_name')->
          join('products','products.id', '=', 'center_production_has_products.products_id')->
          join('measure_unit','measure_unit.id', '=' , 'products.id_measure_unit')->
          where('center_production_has_products.center_production_orders_id',$id)->
          get();
        
        return $recipe;





        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductionHasProducts  $productionHasProducts
     * @return \Illuminate\Http\Response
     */
    public function show(ProductionHasProducts $productionHasProducts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductionHasProducts  $productionHasProducts
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductionHasProducts $productionHasProducts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductionHasProducts  $productionHasProducts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductionHasProducts $productionHasProducts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductionHasProducts  $productionHasProducts
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductionHasProducts $productionHasProducts)
    {
        //
    }
}
