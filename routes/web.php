<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;/*ruta de donde se encuentra nuestro controlador */
use App\Http\Controllers\ConsultoriosController;
use App\Http\Controllers\DoctoresController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\SecretariasController;
use App\Http\Controllers\ReneController;


Route::get('/', function () {
    return view('modulos.Seleccionar');
});

Route::get('Ingresar', function () {
    return view('modulos.Ingresar');
});

Auth::routes();

Route::get('Inicio', [InicioController::class, 'index']);
Route::get('Mis-Datos', [InicioController::class, 'DatosCreate']);
Route::put('Mis-Datos', [InicioController::class, 'DatosUpdate']);
Route::get('Inicio-Editar', [InicioController::class, 'edit']);
Route::put('Inicio-Editar', [InicioController::class, 'update']);

//Rutas de Consultorio
Route::get('Consultorios', [ConsultoriosController::class, 'index']);
Route::post('Consultorios', [ConsultoriosController::class, 'store']);
Route::put('Consultorio/{id}', [ConsultoriosController::class, 'update']);
Route::delete('borrar-Consultorio/{id}', [ConsultoriosController::class, 'destroy']);

//Rutas de doctores
Route::get('Doctores', [DoctoresController::class, 'index']);
Route::post('Doctores', [DoctoresController::class, 'store']);
Route::get('Eliminar-Doctor/{id}', [DoctoresController::class, 'destroy']);
Route::put('Editar-Doctor/{id}', [DoctoresController::class, 'show']);//esta se le agrego para ver los datos

//Ruta de Pacientes
Route::get('Pacientes', [PacientesController::class, 'index']);
Route::get('Crear-Paciente', [PacientesController::class, 'create']);
Route::post('Crear-Paciente', [PacientesController::class, 'store']);
Route::get('Editar-Paciente/{id}', [PacientesController::class, 'edit']);
Route::put('actualizar-paciente/{paciente}', [PacientesController::class, 'update']);
Route::get('Eliminar-Paciente/{id}', [PacientesController::class, 'destroy']);

//CITAS
Route::get('Citas/{id}', [CitasController::class, 'index']);
Route::post('Horario', [CitasController::class, 'HorarioDoctor']);
Route::put('editar-horario/{id}', [CitasController::class, 'EditarHorario']);
Route::post('Citas/{id_doctor}', [CitasController::class, 'CrearCita']);
Route::delete('borrar-cita', [CitasController::class, 'destroy']);

//Pacientes
    // ver consultorio como Paciente  esta en                  al final
Route::get('Ver-Consultorios', [ConsultoriosController::class, 'verConsultorios']);
    //ver doctores com paciente
Route::get('Ver-Doctores/{id}', [DoctoresController::class, 'VerDoctores']);
    //historial de citas paciente
Route::get('historial', [CitasController::class, 'historial']);

//Crear Secretarias
Route::get('Secretarias', [SecretariasController::class, 'index']);
Route::post('Secretarias', [SecretariasController::class, 'store']);
Route::get('Eliminar-Secretaria/{id}', [SecretariasController::class, 'destroy']);
Route::get('Editar-Secretaria/{id}',[SecretariasController::class, 'show']);
Route::put('actualizar-secretaria/{id}',[SecretariasController::class, 'update']);

//Rene, la variable rene viene de modulos que va al controlador
Route::get('Rene', [ReneController::class, 'index']);





//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
