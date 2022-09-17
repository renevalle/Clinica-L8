@extends('welcome')

@section('content')

<div class="content-wrapper">
    <section class="content-header">

        <h1>Doctores del Consltorio de: <br>
        <b>{{ $consultorio->consultorio }}</b></h1>
        

    </section>

    <section class="content">

        <div class="box">

            <div class="box-body">

                <table class="table table-bordered table-hover table-striped">

                    <thead>
                        <tr>
                            <th>Nombre y Apellido</th>
                            <th>Emai</th>
                            <th>Telefono</th>
                            <th>Horario</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($horarios as $hora)

                            @foreach($doctores as $doctor)

                            @if($hora->id_doctor == $doctor->id)

                                <tr>
                                    <td>{{ $doctor->name }}</td>
                                    <td>{{ $doctor->email }}</td>
                                
                                        @if($doctor->telefono != "")
                                            <td>{{ $doctor->telefono }}</td>

                                            @else
                                            <td>Sin numero</td>
                                            <!-- @if($doctor->telefono == "")
                                                <td>Sin numero</td>

                                                @else
                                                <td>{{ $doctor->telefono }}</td>
                                                @endif
                                            -->
                                        @endif

                                    <td>{{ $hora->horaInicio }} - {{ $hora->horaFin }}</td>

                                    <td>
                                        <a href="{{ url('Citas/'.$doctor->id) }}">
                                            <button class="btn btn-primary">Agenda de citas</button>
                                        </a>
                                    </td>

                                    @endif
                                
                                </tr>
                            
                            @endforeach

                        @endforeach

                    
                    </tbody>

                </table>


            </div>
        
        </div>

    </section>

</div>

@endsection