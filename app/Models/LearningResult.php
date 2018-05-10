<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LearningResult extends Model
{
    protected $table = 'learning_results';

    protected $fillable =['id_competence', 'learning_result'];

    public $timestamps = false;
}
