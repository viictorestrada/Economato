<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
  protected $fillable = [
    'provider_id', 'contract_number', 'contract_price', 'start_date', 'finish_date', 'products_id', 'quantity', 'unit_price', 'taxes_id', 'total_with_tax', 'tax_value', 'total', 'status'
  ];

  public $timestamps = false;
}
