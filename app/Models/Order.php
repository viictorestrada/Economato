<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model{

  protected $table='orders';

  protected $fillable =['files_id','recipes_id','order_date','status','user_name','cost'];



}

?>
