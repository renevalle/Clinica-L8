@extends('welcome')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <h1>Gestor de Consultorios</h1>
    </section>
    <section class="content">
        <div class="box">
            <br>
                    <form method="post">
                        @csrf
                        <div class="col-md-6 col-xs-12">
                            <input type="text" class="form-control" name="consultorio" 
                            placeholder="Ingrese Nuevo Consultorio" required="">
                        </div>
                        <button class="btn btn-primary" type="submit">Agregar Consultorio</button>
                    </form>
                    <br>
                    <div class="box-body">
                        @foreach($consultorios as $consultorio)
                        <!--transforma la variable consultorios a singular consultorio-->
                            <div class="row">
                                <form method="post" action="{{ url('Consultorio/'.$consultorio->id) }}">
                                    @csrf
                                    @method('put')
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="consultorioE" value="
                                        {{ $consultorio->consultorio }}">
                                        <!--variable aqui->variable de la base de datos(y poder mostrarlo en tiempo real al guardar en base) -->
                                    </div>
                                    <div class="col-md-1">
                                        <button class="btn btn-success" type="submit">Guardar</button>
                                    </div>                          
                                </form>
                                <div class="col-md-1">
                                    <form method="post" action="{{ url('borrar-Consultorio/'.$consultorio->id) }}">
                                    @csrf
                                    @method('delete')
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                    </form>
                                </div>
                            </div>
                    <br>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection