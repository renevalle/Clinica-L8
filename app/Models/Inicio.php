<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inicio extends Model
{
    use HasFactory;

    protected $table = "inicio";

    protected $fillable =[

        'dias','email','horaInicio','horaFin','direccion','telefono','logo'

    ];

    public $timestamps = false;

}
