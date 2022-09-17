<?php

namespace App\Http\Controllers;

use App\Models\Doctores;
use App\Models\Pacientes;
use App\Models\Consultorios;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Hash;
use Illuminate\Support\facades\DB;

class DoctoresController extends Controller
{
    public function __construct()/** permitira solo ingreso a los usuarios logeados */
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //Para autenficar los usuarios que ingresan
        if(auth()->user()->rol != 'Administrador' && auth()->user()->rol != 'Secretaria'){
            
            return redirect('Inicio');
        }
        /**variable = modeo de consultorio y que traiga todo */
        $consultorios = Consultorios::all();

        $doctores = Doctores::all();

        /**                            para enviar la variable */
        return view('modulos.Doctores', compact('consultorios', 'doctores'));
    }

        public function store(Request $request)
    {
        /**variable que sera request con validacin para que no se repita el email */
       
       /**validaciones a las cajas de texto */
        $datos = request()->validate([
            'name' => ['required'],
            'sexo' => ['required'],
            'id_consultorio' => ['required'],
            'password' => ['required', 'string', 'min:3'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'telefono' => ['string'],
            'documento'=>['required','string']
        ]);

        Doctores::create([
            /**mandar los datos del modal a la base */
            'name'=>$datos['name'],
            'id_consultorio'=>$datos['id_consultorio'],
            'email'=>$datos['email'],
            'sexo'=>$datos['sexo'],
            'documento'=>$datos['documento'],
            'telefono'=>$datos['telefono'],
            'rol'=>'Doctor',
            'password'=>hash::make($datos['password'])
        ]);
        /*despues de crear el doctor que nos redireccione a la pantalla de doctores* mostrar el mensaje de doctor registrado que esta en blade */
        return redirect('Doctores')->with('Registrado', 'Si');
    }

    
    public function destroy($id)
    {
    
        DB::table('users')->whereId($id)->delete();

        return redirect('Doctores');

    }

    public function VerDoctores($id)
    {
        /**variable consultorio es igual al modelo de consultorios y que con find busque el parametro id  */
        $consultorio = Consultorios::find($id);

        $doctores = DB::select('select * from users where id_consultorio = '.$id);

        $horarios = DB::select('select * from horarios');

        return view("modulos.Ver-Doctores", compact('consultorio', 'doctores', 'horarios'));

    }

    public function show($id)
    {
        /**si auth del usuario en el rol es diferente de admin y ..... */
        if(auth()->user()->rol != "Administrador"){
            
            return redirect('Inicio');
        }
        /**variable secretaria sea igual al modelo de secretarias que traiga todo donde rol es igual a secretarias */
        $Doctores = Doctores::all()->where('rol', 'Doctor');
        $doctor = doctores::find($id);

        /**retorna a la vista en modulos secretarias la variable secretarias */
        return view('modulos.Doctores', compact('Doctores', 'doctor'));
    }
}
