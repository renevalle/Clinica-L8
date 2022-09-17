<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    use HasFactory;

    /* para usar la tabla consultorios */
    protected $table = "citas";
    /* para usar la columna consultorios de la tabla */
    protected $fillable = [
        'id_doctor', 'id_paciente', 'FyHinicio', 'FyHfinal'
     ];

    public $timestamps = false;

    public function PAC()
    {
        /*retornar relacion (belongsTo) modelo de paciente la clase lo relacione con id paciente* 
        y que la funciion PAC lo llame en welcome en eventos */
        return $this->belongsTo(Pacientes::class, 'id_paciente');



    }
}
