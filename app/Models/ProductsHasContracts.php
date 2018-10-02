<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductsHasContracts extends Model
{

  protected $table = "products_has_contracts";

  protected $fillable = [
    'products_id', 'contracts_id', 'quantity', 'unit_price', 'taxes_id',
     'total_with_tax', 'tax_value', 'total', 'quantity_agreed','status'
  ];
  public $timestamps = false;

}

?>
