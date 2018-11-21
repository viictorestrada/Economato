<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'product_code' => $row[0],
            'id_product_type' => $row[1],
            'product_name' => $row[2],
            'id_measure_unit' => $row[3],
            'presentation_id' => $row[4]
        ]);
    }
}
