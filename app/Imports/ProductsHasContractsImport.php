<?php

namespace App\Imports;

use App\Models\ProductsHasContracts;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsHasContractsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ProductsHasContracts([
              'products_id' => $row[0],
              'contracts_id' => $row[1],
              'quantity' => $row[2],
              'unit_price' => $row[3],
              'taxes_id' => $row[4],
              'total_with_tax' => $row[5],
              'tax_value' => $row[6],
              'total' => $row[7],
              'quantity_agreed' => $row[8]
        ]);
    }
}
