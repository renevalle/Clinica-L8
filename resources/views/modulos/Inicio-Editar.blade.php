@extends('welcome')

@section('content')

<div class="content-wrapper">
    <section class="content-header">

        <h1>Inicio</h1>

    </section>

    <section class="content">

        <div class="box">
            <form method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div clarr="row">
                    <div class="col-md-6 col-xs-12">
                        <h2>Dias:</h2>
                        <input type="text" class="input-lg" name="dias" value="{{ $inicio->dias }}">

                        <div class="form-group">
                        <h2>Horarios:</h2>
                        Desde: <input type="time" class="input-lg" name="horaInicio" value="{{ $inicio->horaInicio }}">
                        <h2>Dias:</h2>
                        Hasta: <input type="time" class="input-lg" name="horaFin" value="{{ $inicio->horaFin }}">
                        </div>

                        <h2>Direccion:</h2>
                        <input type="text" class="input-lg" name="direccion" value="{{ $inicio->direccion }}">

                    </div>
                    <div class="col-md-6 col-xs-12">
                        
                    <h2>Telefono:</h2>
                        <input type="text" class="input-lg" name="telefono" value="{{ $inicio->telefono }}">

                        <h2>Email:</h2>
                        <input type="email" class="input-lg" name="email" value="{{ $inicio->email }}">

                        <br><br>
                        <input type="file" name="logoN">
                        <br>
                        <img src="http://localhost/clinica-l8/public/storage/{{ $inicio->logo }}" width="200px">
                        
                        <br><br>
                        <button type="submit" class="btn btn-success">Guardar Cambios</button>
                    </div>

                </div>
            </form>
        </div>

    </section>

</div>

@endsection