@extends('welcome')

@section('content')

<div class="content-wrapper">
    <section class="content-header">

        <h1>Gestor de Pacientes</h1>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header">

                <a href="Crear-Paciente">
                    <button class="btn btn-primary btn-lg" >Agregar Paciente</button>
                </a>

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

                        @foreach($pacientes as $paciente)

                        <tr>
                            <td>{{ $paciente->id }}</td>
                            <td>{{ $paciente->name }}</td>
                            <td>{{ $paciente->documento }}</td>
                            <td>{{ $paciente->email }}</td>

                                @if($paciente->telefono == "")
                                <td>Sin numero</td>
                                @else
                                <td>{{ $paciente->telefono }}</td>
                                @endif

                            <td>                                
                                <a href="Editar-Paciente/{{ $paciente->id }}">

                                    <button class="btn btn-success"><i class="fa fa-pencil"></i></button>

                                </a>

                                <button class="btn btn-danger EliminarPaciente" Pid="{{ $paciente->id }}" 
                                Paciente="{{ $paciente->name }}"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        
                        @endforeach

                      
                    </tbody>

                </table>

            </div>

        </div>

    </section>

</div>

@endsection