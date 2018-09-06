<?php

namespace App\Http\Controllers;

use App\Models\ProductionHasProducts;
use App\Models\ProductionOrders;
use App\Models\ProductsHasContracts;
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
        ProductionOrders::where('id',$request['center_production_orders_id'])->update(['cost'=> $cost]); 
        return back()->with([swal()->autoclose(1500)->success('Modificación exitosa!','Se ha modificado el pedido con exito')]);

        
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
