<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
  protected $table = 'contracts';

  protected $fillable =['provider_id', 'contract_number', 'contract_price', 'contract_date'];

  public $timestamps = false;
}
