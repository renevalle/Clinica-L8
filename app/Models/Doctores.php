<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctores extends Model
{
    use HasFactory;

    /* para usar la tabla consultorios */
    protected $table = "users";
    /* para usar la columna consultorios de la tabla */
    protected $fillable = [ 

        'name','email','password','id_consultorio','sexo','documento','telefono','rol'

     ];

    public $timestamp = false;

    /**funcion para ir a buscar el nombre de los consultorios a la tabla para mostrarlos */
    public function CON()
    {
        /*retornar la clase consultorios relacione con id_consultorio */
        return $this->belongsTo(Consultorios::class, 'id_consultorio');
        /*con esto estamos diciendo que va a relacionar en la tabla de doctores(user) en id_consultorios
        lo que tenga en la tabla los que lo relaciona con consultorio */
    }
}
