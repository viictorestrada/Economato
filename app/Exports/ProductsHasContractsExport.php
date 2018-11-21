<?php

namespace App\Exports;

use App\Models\ProductsHasContracts;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductsHasContractsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ProductsHasContracts::all();
    }
}
