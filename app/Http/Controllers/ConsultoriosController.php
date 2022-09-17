<?php

namespace App\Http\Controllers;

use App\Models\Consultorios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultoriosController extends Controller
{
    public function __construct()/** permitira solo ingreso a los usuarios logeados */
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //Para autentificar los usuarios que ingresan
        if(auth()->user()->rol != 'Administrador' && auth()->user()->rol != 'Secretaria'){
            
            return redirect('Inicio');
        }
        /*para mandar a llamar la informacion desde la base de datos* */
        $consultorios = Consultorios::all();
        
        return view('modulos.Consultorios')->with('consultorios', $consultorios);
        /*                               * para mostar la informacio en el texto*/
    }

   
    public function store(Request $request)
    {
        Consultorios::create(['consultorio' => request('consultorio')]);

        return redirect('Consultorios');
    }

    public function update(Request $request)
    {

      /*  dd(Request('id'));*/
    /* clase::usar table(consultorios) donde columna id sea igual a lo que trae request id actualizando [columna consultorio que trae en consultorioE]) */
        DB::table('consultorios')->where('id',request('id'))->update(['consultorio' =>request('consultorioE')]);

        return redirect('Consultorios');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consultorios  $consultorios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /**clase DB en la tabla de consultorios donde el id sea igual al id y lo elimine */
        DB::table('consultorios')->whereId($id)->delete();
        /**retornar un redirect a la vista de consultorios */
        return redirect('Consultorios');

    }

    public function verConsultorios()
    {

        /**variable consultorio sea igual a la clse Consultorios y que traiga todo*/
        $consultorios = Consultorios::all();
        /**retornar a la vista de la carpeta modulos del archivo ver consultorios y con with que envie la variable creada de consultorios */
        return view('modulos.Ver-Consultorios')->with('consultorios', $consultorios);

    }

   
}
