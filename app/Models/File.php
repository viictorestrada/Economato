<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'files';

    protected $fillable =['program_id', 'characterization_id' ,'file_number', 'file_route', 'apprentices', 'status'];

    public $timestamps = false;
}
