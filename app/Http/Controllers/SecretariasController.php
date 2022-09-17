<?php

namespace App\Http\Controllers;

use App\Models\Secretarias;
use Illuminate\Http\Request;
use Illuminate\support\facades\Hash;
use Illuminate\support\facades\DB;


class SecretariasController extends Controller
{
    public function __construct()/** permitira solo ingreso a los usuarios autentificados */
    {
        $this->middleware('auth');
    }

    public function index()
    {
        /**si auth del usuario en el rol es diferente de admin y ..... */
        if(auth()->user()->rol != "Administrador"){
            
            return redirect('Inicio');
        }
        /**variable secretaria sea igual al modelo de secretarias que traiga todo donde rol es igual a secretarias */
        /**la variable secretaria se llama a todas para que no halla problemas en la pantalla */
        $secretarias = Secretarias::all()->where('rol', 'Secretaria');

        /**retorna a la vista en modulos secretarias la variable secretarias */
        return view('modulos.Secretarias')->with('secretarias', $secretarias);
    }
   
    public function store(Request $request)
    {
        $datos = request()->validate([
            'name' =>['required','string','max:255'],
            'email' => ['required','string','max:255','email','unique:users'],
            'password' => ['required','string','min:3'],
            'telefono'=>['required','string','max:255'],
            'documento'=>['required','string','max:255']
           
        ]);

        $secretarias = Secretarias::create([
            'name'=>$datos["name"],
            'id_consultorio'=> 0,
            'email'=>$datos["email"],
            'password'=>Hash::make($datos["password"]),
            'sexo'=>'',
            'telefono'=>$datos["telefono"],
            'documento'=>$datos["documento"],
            'rol'=>'Secretaria'

        ]);

        return redirect('Secretarias')->with('SecretariaCreada', 'Si');
    }

   
    public function show($id)
    {
        /**si auth del usuario en el rol es diferente de admin y ..... */
        if(auth()->user()->rol != "Administrador"){
            
            return redirect('Inicio');
        }
        /**variable secretaria sea igual al modelo de secretarias que traiga todo donde rol es igual a secretarias */
        $secretarias = Secretarias::all()->where('rol', 'Secretaria');
        $secretaria = Secretarias::find($id);

        /**retorna a la vista en modulos secretarias la variable secretarias */
        return view('modulos.Secretarias', compact('secretarias', 'secretaria'));
    }
  
    public function update(Request $request, Secretarias $id)

    {
        //se valida el password nuevo para saber si es distinto de nada
        if($id['email'] != request('email') && request('passwordN') != ""){
            $datos = request()->validate([
                'name' =>['required', 'string', 'max:255'],
                'email' =>['required', 'string', 'max:255', 'email', 'unique:users'],
                'passwordN' =>['required', 'string', 'min:3']
                 // 'telefono'=>['required','string','max:255'],
                 //'documento'=>['required','string','max:255']
            ]);
            DB::table('users')->where('id', $id["id"])->update(['name' => $datos["name"],
                                     'email' => $datos["email"],
                                     //'telefono' => $datos["telefono"],
                                     //'documento' => $datos["documento"],
                                      'password' => Hash::make($datos["passwordN"])]);
        //de la base en la tabla usuario donde columna id a lo que trae la variable id en id, actualice lo que trae datos en name
        //de la pantalla(secretaria.blade->modal)

        //o mismo de arriba pero solo se valida el password normales vacio
        }else if($id['email'] != request('email') && request('passwordN') == ""){
            $datos = request()->validate([
                'name' =>['required', 'string', 'max:255'],
                'email' =>['required', 'string', 'max:255', 'email', 'unique:users'],
                'password' =>['required', 'string', 'min:3']
                 // 'telefono'=>['required','string','max:255'],
            //'documento'=>['required','string','max:255']
            ]);
            DB::table('users')->where('id', $id["id"])->update(['name'=> $datos["name"],
                                     'email' => $datos["email"],
                                       //'telefono' => $datos["telefono"],
                                     //'documento' => $datos["documento"],
                                      'password' => Hash::make($datos["password"])]);

        //si el email es igual al email y el password es distinto de vacio
        }else if($id['email'] == request('email') && request('passwordN') != ""){
            $datos = request()->validate([
                'name' =>['required', 'string', 'max:255'],
                'email' =>['required', 'string', 'max:255', 'email'],
                'passwordN' =>['required', 'string', 'min:3']
                 // 'telefono'=>['required','string','max:255'],
            //'documento'=>['required','string','max:255']
            ]);
            DB::table('users')->where('id', $id["id"])->update(['name'=> $datos["name"],
                                     'email' => $datos["email"],
                                       //'telefono' => $datos["telefono"],
                                     //'documento' => $datos["documento"],
                                      'password' => Hash::make($datos["passwordN"])]);
                                     
        //si el email y el password ambos sean iguales
        }else{
            $datos = request()->validate([
                'name' =>['required', 'string', 'max:255'],
                'email' =>['required', 'string', 'max:255', 'email'],
                'passwordN' =>['required', 'string', 'min:3']
                 // 'telefono'=>['required','string','max:255'],
            //'documento'=>['required','string','max:255']
            ]);
            DB::table('users')->where('id', $id["id"])->update(['name'=> $datos["name"],
                                     'email' => $datos["email"],
                                       //'telefono' => $datos["telefono"],
                                     //'documento' => $datos["documento"],
                                      'password' => Hash::make($datos["password"])]);

        }
        return redirect('Secretarias')->with('SecretariaEditar','Si');
       
    }

   
    public function destroy($id)
    {
        //la clase modelo secretaria con destroy en el id lo elimine y lo redireccione al modulo de secretarias
        Secretarias::destroy($id);

        return redirect('Secretarias');
    }
}
