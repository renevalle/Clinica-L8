<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secretarias extends Model
{
    use HasFactory;

        protected $table = 'users';
    /* para usar la tabla consultorios */

    protected $fillable =[
        'name','email','password','id_consultorio','sexo','documento','telefono','rol'

    ];

   public $timestamp = false;
  
}
