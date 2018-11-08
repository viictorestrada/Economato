<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
  protected $fillable = [
    'provider_id', 'contract_number', 'contract_price', 'start_date', 'finish_date','Contracts_url','status'
  ];

  public $timestamps = false;
}
