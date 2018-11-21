<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'rol_id', 'document_id', 'name',  'last_name', 'gender', 'address', 'phone', 'celphone', 'email', 'password', 'status','number_document'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
      if (!empty($value)) {
        $this->attributes['password'] = \Hash::make($value);
      }
    }
}
