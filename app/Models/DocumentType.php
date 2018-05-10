<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    protected $table = 'document_type';

    protected $fillable = ['type_document'];

    public $timestamps = false;
}
