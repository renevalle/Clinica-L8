<?php

namespace App\Http\Controllers;

use App\Models\Pacientes;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Hash;
use Illuminate\Support\facades\DB;

class PacientesController extends Controller
{
    public function __construct()/** permitira solo ingreso a los usuarios logeados */
    {
        $this->middleware('auth');
    }
    public function index()
    {/**si auth del usuario en el rol es diferente de admin y ..... */
        if(auth()->user()->rol != 'Administrador' && auth()->user()->rol != 'Secretaria' && auth()->user()->rol != 'Doctor'){
            
            return redirect('Inicio');
        }

        $pacientes = DB::select('select * from users where rol = "Paciente"');

        return view('modulos.Pacientes')->with('pacientes', $pacientes);

    }

    public function create()
    {
        if(auth()->user()->rol != 'Administrador' && auth()->user()->rol != 'Secretaria' && auth()->user()->rol != 'Doctor'){
            
            return redirect('Inicio');
        }

        return view('modulos.Crear-Paciente');
    }

    public function store(Request $request)
    {
          /**variable que sera request con validacin para que no se repita el email */
       
       /**validaciones a las cajas de texto */
       $datos = request()->validate([
        'name' => ['required'],
        'documento' => ['required'],
        'password' => ['required', 'string', 'min:3'],
        'email' => ['required', 'string', 'email', 'unique:users'],
        'telefono' => ['string']
    ]);

    Pacientes::create([
        /**mandar los datos del modal a la base */
        'name'=>$datos['name'],
        'id_consultorio'=>0,
        'email'=>$datos['email'],
        'sexo'=>'',
        'documento'=>$datos['documento'],
        'telefono'=>$datos['telefono'],
        'rol'=>'Paciente',
        'password'=>hash::make($datos['password'])
    ]);
    /**despues de crear el doctor que nos redireccione a la pantalla de doctores* mostrar el mensaje de doctor registrado que esta en blade */
    return redirect('Pacientes')->with('Agregado', 'Si');
    }
  
    public function edit(Pacientes $id)
    {
        if(auth()->user()->rol != 'Administrador' && auth()->user()->rol != 'Secretaria' && auth()->user()->rol != 'Doctor'){
            
            return redirect('Inicio');
        }
        /**dd($id->id);*/
        $paciente = Pacientes::find($id->id);

        return view('modulos.Editar-Paciente')->with('paciente', $paciente);
    }

   
    public function update(Request $request, Pacientes $paciente)
    {
        /**dd($paciente[''id'']); */
        /**si el email del paciente es diferente al que ya existe y el password nuevo es diferente a vacio */
        if($paciente["email"] != request('email') && request('passwordN') != ""){
 
            $datos = request()->validate([
 
                'name' => ['required'],
                'documento' => ['required'],
                'passwordN' => ['required', 'string', 'min:3'],
                'email' => ['required', 'string', 'email', 'unique:users'],
                'telefono'=>['string']
 
 
            ]);
         /*si se cumple con DB*si en la tabla de usuarios donde el id sea igual al paciente id actualizar el nombre,email,documento,password */
            DB::table('users')->where('id', $paciente["id"])->update(['name' => $datos["name"], 'email' => $datos["email"], 
            'documento' => $datos["documento"], 'password' => Hash::make($datos["passwordN"]), 'telefono'=> $datos["telefono"]]);

            /** si paciente email de nuevo es diferente a email y password es igual a vacio> validad el PASSWORD NORMAL*/
            /** email es diferente y password es vacio */
        }else if($paciente["email"] != request('email') && request('passwordN') == ""){
 
            $datos = request()->validate([
 
                'name' => ['required'],
                'documento' => ['required'],
                'password' => ['required', 'string', 'min:3'],
                'email' => ['required', 'string', 'email', 'unique:users'],
                'telefono'=>['string'] 
 
            ]);
 
            DB::table('users')->where('id', $paciente["id"])->update(['name' => $datos["name"], 'email' => $datos["email"], 
            'documento' => $datos["documento"], 'password' => Hash::make($datos["password"]),'telefono'=> $datos["telefono"]]);

            /**SI EMAIL ES IGUAL AL EMAIL Y PASSWORD ES DIFERENTE A VACIO PASSWORDN EL EMAIL ES VALIDADO EN LA TABLE YA QUE ES EL MISMO */ 
        }else if($paciente["email"] == request('email') && request('passwordN') != ""){
 
            $datos = request()->validate([
 
                'name' => ['required'],
                'documento' => ['required'],
                'passwordN' => ['required', 'string', 'min:3'],
                'email' => ['required', 'string', 'email'],
                'telefono'=>['string']  
 
            ]);
 
            DB::table('users')->where('id', $paciente["id"])->update(['name' => $datos["name"], 'email' => $datos["email"], 
            'documento' => $datos["documento"], 'password' => Hash::make($datos["passwordN"]),'telefono'=> $datos["telefono"]]);

            /**  */ 
        }else{
 
            $datos = request()->validate([
 
                'name' => ['required'],
                'documento' => ['required'],
                'password' => ['required', 'string', 'min:3'],
                'email' => ['required', 'string', 'email'],
                'telefono'=>['string']  
 
            ]);

            /** */ 
            DB::table('users')->where('id', $paciente["id"])->update(['name' => $datos["name"], 'email' => $datos["email"], 
            'documento' => $datos["documento"], 'password' => Hash::make($datos["password"]),'telefono'=> $datos["telefono"]]);
 
        }
 
        return redirect('Pacientes')->with('actualizadoP', 'Si');
    }

    /**Eliminar paciente */
    public function destroy($id)
    {
        Pacientes::destroy($id);

        return redirect('Pacientes');
    }
}
