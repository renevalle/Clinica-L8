<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultorios extends Model
{
    use HasFactory;
    /* para usar la tabla consultorios */
    protected $table = "consultorios";
    /* para usar la columna consultorios de la tabla */
    protected $fillable = [ 'consultorio' ];

    public $timestamps = false;
}
