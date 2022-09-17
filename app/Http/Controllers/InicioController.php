<?php

namespace App\Http\Controllers;

use App\Models\Inicio;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Hash;
use Illuminate\Support\facades\DB;
use Illuminate\Support\facades\Storage;

class InicioController extends Controller
{

    public function __construct()/** permitira solo ingreso a los usuarios logeados */
    {
        $this->middleware('auth');
    }

    public function index() /*de tipo resouce quiere decir que ya vendran echas todas las funciones echas*/
    {
        $inicio = Inicio::find(1);
        return view('modulos.Inicio')->with('inicio', $inicio);

    }

    public function DatosCreate()
    {
        return view('modulos.Mis-Datos');
    }
   
    public function DatosUpdate(Request $request)
    {   
        //si autentificar la tabla usuario en email es diferente lo que se envia en request email
        //si viene con informacion password nuevo
        //variable datos es igual a reques y validato
        if(auth()->user()->email != request('email')){

            if(isset($datos["passwordN"])){
                $datos = request()->validate([

                    'name' =>['required','string','max:255'],
                    'telefono' =>['string','max:255'],
                    'documento' =>['string','max:255'],
                    'email' =>['required','string','max:255','email','unique:users'],
                    'passwordN' =>['required','string','min:3']
                ]);           
            }else{
                $datos = request()->validate([

                    'name' =>['required','string','max:255'],
                    'telefono' =>['string','max:255'],
                    'documento' =>['string','max:255'],
                    'email' =>['required','string','max:255','email','unique:users']
                ]);
            }
        }else{
            if(isset($datos["passwordN"])){
                $datos = request()->validate([

                    'name' =>['required','string','max:255'],
                    'telefono' =>['string','max:255'],
                    'documento' =>['string','max:255'],
                    'email' =>['required','string','max:255','email'],
                    'passwordN' =>['required','string','min:3']
             ]);
            }else{
                $datos = request()->validate([

                    'name' =>['required','string','max:255'],
                    'telefono' =>['string','max:255'],
                    'documento' =>['string','max:255'],
                    'email' =>['required','string','email']
                ]);
            }
        }

        if(isset($datos["passwordN"])){
            DB::table('users')->where('id', auth()->user()->id)->update(['name'=>$datos['name'], 
            'email'=>$datos["email"],'telefono'=>$datos["telefono"],'documento'=>$datos["documento"]]);

        }else{

            DB::table('users')->where('id', auth()->user()->id)->update(['name'=>$datos['name'], 
            'email'=>$datos["email"],'telefono'=>$datos["telefono"],'documento'=>$datos["documento"],
            'password'=>Hash::make($datos["passwordN"])]);
        }

        return redirect('Mis-Datos');

    }

    public function edit(Inicio $inicio)
    {
        $inicio = Inicio::find(1);

        return view('modulos.Inicio-Editar')->with('inicio', $inicio);
    }


    public function update(Request $request)
    {
        $datos = request();
        $inicio = Inicio::find(1);

        $inicio->dias = $datos["dias"];
        $inicio->horaInicio = $datos["horaInicio"];
        $inicio->horaFin = $datos["horaFin"];
        $inicio->direccion = $datos["direccion"];
        $inicio->telefono = $datos["telefono"];
        $inicio->email = $datos["email"];
        //variable inicio en la columna lo que traiga Datos en ""

        if(request('logoN')){

            Storage::delete('public/'.$inicio->logo);

            $rutaImg = $request['logoN']->store('inicio', 'public');
            $inicio->logo = $rutaImg;
        }

        $inicio ->save();

        return redirect('Inicio-Editar');

    }

    public function destroy(Inicio $inicio)
    {
        //
    }
}
