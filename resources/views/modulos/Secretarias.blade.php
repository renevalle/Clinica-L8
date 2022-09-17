@extends('welcome')

@section('content')

<div class="content-wrapper">
    <section class="content-header">

        <h1>Gestor de Secretarias</h1>

    </section>

    <section class="content">

        <div class="box">
            <div class="box-header">
                <!-- primari = boton azul, lg = grande,   para agregar un modal  -->
                <button class="btn btn-primary btn-lg " data-toggle="modal" data-target="#CrearSecretaria">Crear Secretaria</button>

            </div>

                <div class="box-body">

                    <table class="table table-bordered table-hover table-striped">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre y Apellido</th>
                                <th>Documento</th>
                                <th>Email</th>
                                <th>Telefono</th>
                                <th>Accion</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($secretarias as $secretaria)

                                <tr>
                                    <td>{{ $secretaria->id }} </td>
                                    <td>{{ $secretaria->name }} </td>

                                            @if($secretaria->documento != "")
                                        <td>{{ $secretaria->documento }} </td>
                                            @else
                                        <td>No Registrado </td>
                                            @endif
                                    
                                    <td>{{ $secretaria->email }} </td>

                                            @if($secretaria->telefono != "")
                                        <td>{{ $secretaria->telefono }}</td>
                                            @else
                                        <td>No Registrado </td>
                                            @endif 

                                    <td>
                                        <!--modulo E-S con la variable que trae el id-->
                                    <a href="{{ url('Editar-Secretaria/'.$secretaria->id) }}">
                                    <button class=" btn btn-success"><i class="fa fa-pencil"></i></button>
                                    </a>
                                  
                                    <button class=" btn btn-danger EliminarSecretaria" Sid="{{ $secretaria->id }}"
                                    ><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="CrearSecretaria" class="modal fade">

    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
                @csrf
                <!--para que laravel nos permita agregar formularios-->
                <div class="modal-body">                  
                    <div class="box-body">
                        <div class="form-group">
                            <label>Nombre y Apellido:</label>
                            <input type="text" class="form-control input-lg" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label>Documento:</label>
                            <input type="text" class="form-control input-lg" name="documento" value="{{ old('documento') }}">
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="text" class="form-control input-lg" name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="alert alert-danger">El Email ya Existe...</div>
                            @enderror
                        </div>
                       <div class="form-group">
                            <label>Telefono</label>
                            <input type="text" class="form-control input-lg" name="telefono" value="{{ old('telefono') }}">
                        </div>
                        <div class="form-group">
                            <label>Contraseña:</label>
                            <input type="text" class="form-control input-lg" name="password" value="{{ old('password') }}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Crear</button>
                    <!--                                            para cerrar el modal-->
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="EditarSecretaria" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="{{ url('actualizar-secretaria/'.$secretaria->id) }}">
                @csrf
                @method('put')
                <!--para que laravel nos permita agregar formularios-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Nombre y Apellido:</label>
                            <input type="text" class="form-control input-lg" name="name" value="{{ $secretaria->name }}">
                        </div>
                       <div class="form-group">
                            <label>Documento:</label>
                            <input type="text" class="form-control input-lg" name="documento" value="{{ $secretaria->documento }}">
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="text" class="form-control input-lg" name="email" required value="{{ $secretaria->email }}">
                            @error('email')
                                <div class="alert alert-danger">El Email ya Existe</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Telefono:</label>
                            <input type="text" class="form-control input-lg" name="telefono" value="{{ $secretaria->telefono }}">
                        </div>
                        <div class="form-group">
                            <label>Nueva Contraseña:</label>
                            <input type="text" class="form-control input-lg" name="passwordN" value="">
                            <input type="hidden" name="password" value="{{ $secretaria->password }}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Guardar Cambios</button>
                    <!--                                            para cerrar el modal-->
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>

@endsection