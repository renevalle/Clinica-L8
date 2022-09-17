<?php

namespace App\Http\Controllers;

use App\Models\Citas;
use App\Models\Pacientes;
use App\Models\Doctores;
use App\Models\User;
use App\Models\Consultorios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitasController extends Controller
{
    public function __construct()/** permitira solo ingreso a los usuarios logeados */
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        /*si el usuario en su roll doctor y el id sea distinto del usuario id* */
        if(auth()->user()->rol =="Doctor" && $id != auth()->user()->id){

            return redirect('Inicio');

        }

        $horarios = DB::select('select * from horarios where id_doctor = '.$id);

        $pacientes = Pacientes::all();/**que traiga todos los pacientes */

        $citas = Citas::all()->where('id_doctor', $id);
        /**variable citas sea igual al modelo de citas y que traiga todo lo que encuentre donde id-doctor sea 
        * igual al a variable de arriba donde esta index id*/

        /**variable docotr del modelo de doctores busque el id para mostra los nombres de los doctores en el calendario del paciente */
        $doctor = Doctores::find($id);

        return view('modulos.Citas', compact('horarios', 'pacientes', 'citas', 'doctor'));

    }

    public function HorarioDoctor(Request $request)
    {
        $datos = request();
        /**en la base de la tabla horarios insertar en el id-doctor de auth usuario id horainicio lo que trae el dato hora inicio */
        DB::table('horarios')->insert(['id_doctor' => auth()->user()->id, 
        'horaInicio' => $datos["horaInicio"], 'horaFin' => $datos["horaFin"]]);

        return redirect('Citas/'.auth()->user()->id);/*retornar a la pagina de citas* con el usuario id */
    }

    public function EditarHorario(Request $request)
    {
        $datos = request();
        /**dd($datos['id']);*/
        /**en la base de la tabla horarios cuando la columna ID sea igual a lo que trae $datos en el id->actualizar horainicio
        * actualize los cambios por $datos en horaInicio*/
        DB::table('horarios')->where('id',$datos['id'])->update(['horaInicio' => $datos['horaInicioE'], 'horaFin' => $datos['horaFinE']]);

        return redirect('Citas/'.auth()->user()->id);
    }

    public function CrearCita(Request $id_doctor)
    {
        Citas::create(['id_doctor' => request('id_doctor'), 'id_paciente' => request('id_paciente'), 
        'FyHinicio' => request('FyHinicio'), 'FyHfinal' => request('FyHfinal')]);

        return redirect('Citas/'.request('id_doctor'));
    }

    public function destroy(Citas $citas)
    {
        /*base de la tabla citas donde el id sea igual lo que nos trae* */
        DB::table('citas')->whereId(request('idCita'))->delete();

        return redirect('Citas/'.request('idDoctor'));

    }

    public function historial()
    {
        if(auth()->user()->rol != "Paciente"){

         return view('modulos.Inicio');
        }else{
        $citas = Citas::all()->where('id_paciente', auth()->user()->id);
        $doctores = User::all()->where('rol', 'Doctor');
        $consultorios = Consultorios::all();

        return view('modulos.Historial', compact('citas', 'doctores', 'consultorios'));
        }
    }
}
