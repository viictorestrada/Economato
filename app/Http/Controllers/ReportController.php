<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;


class ReportController extends Controller
{
    // public function index() {
    //   return view('reports/index');
    // }



    public function index()
    {
        // $products = Product::all();

        // return view('products');
    }

    public function pdf()
    {
        /**
         * toma en cuenta que para ver los mismos
         * datos debemos hacer la misma consulta
        **/
        $products = Product::all();

        $pdf = PDF::loadView('pdf.products', compact('products'));

        return $pdf->download('listado.pdf');
    }

}
