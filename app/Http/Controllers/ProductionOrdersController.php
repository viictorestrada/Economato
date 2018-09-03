<?php

namespace App\Http\Controllers;

use App\Models\productionOrders;
use App\Models\Characterization;
use Illuminate\Http\Request;
use Auth;

class ProductionOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orders.leaderorder');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $characterization_id = Characterization::select('id')->where('characterization_name','Producción de Centro')->get()->first();
        $response = productionOrders::Create([
            'characterizations_id' => $characterization_id->id, 
            'description' => $request['description'], 
            'pax' => $request['quantity'], 
            'user_name' => Auth::user()->name.' '.Auth::user()->last_name,
            'order_date' => $request['order_date'],
            'title' => $request['title']
            ]);
        if ($response) {
            return redirect('Production_orders')->with([swal()->autoclose(1500)->success('Solicitud Éxitosa!', 'Se ha realizado el pedido con exito')]);
        }
        else {
            return redirect('Production_orders')->with([swal()->autoclose(1500)->success('Solicitud Fallida', 'Hubo un error al realizar el pedido')]);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\productionOrders  $productionOrders
     * @return \Illuminate\Http\Response
     */
    public function show(productionOrders $productionOrders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productionOrders  $productionOrders
     * @return \Illuminate\Http\Response
     */
    public function edit(productionOrders $productionOrders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\productionOrders  $productionOrders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, productionOrders $productionOrders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productionOrders  $productionOrders
     * @return \Illuminate\Http\Response
     */
    public function destroy(productionOrders $productionOrders)
    {
        //
    }
}
