@extends('welcome')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <h1>Editar El Paciente: {{ $paciente->name }}</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <a href="{{ url('Pacientes') }}">
                    <button class="btn btn-primary" >Volver a Pacientes</button>
                </a>
            </div>
                <div class="box-body">
                    <form method="post" action="{{ url('actualizar-paciente/'.$paciente->id) }}">

                        @csrf
                        @method('put')

                        <h2>Nombre y Apellido:</h2>
                        <input type="text" class="form-control input-lg" name="name" value="{{ $paciente->name }}">

                        <h2>Documento:</h2>
                        <input type="text" class="form-control input-lg" name="documento" value="{{ $paciente->documento }}">

                        <h2>Email:</h2>
                        <input type="text" class="form-control input-lg" name="email" value="{{ $paciente->email }}">

                        <h2>Nuevo Contraseña:</h2>
                        <input type="text" class="form-control input-lg" name="passwordN" value="">
                        <!--esto es por si no cambian la contrasena sea la misma cuando se creo-->
                        <input type="hidden" class="form-control input-lg" name="password" value="{{ $paciente->password }}">
                        
                        <h2>Telefono</h2>
                        <input type="text" class="form-control input-lg" name="telefono" value="{{ $paciente->telefono }}">
                        
                        <br><br>
                        <button class="btn btn-success" type="submit">Actualizar</button>
                    </form>
                </div>
            </div>
    </section>
</div>
@endsection