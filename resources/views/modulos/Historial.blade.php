@extends('welcome')

@section('content')

<div class="content-wrapper">
    <section class="content-header">

        <h1>Historial de citas Medicas</h1>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-body">
                <table class="table table-bordered table-hover table-striped">

                    <thead>
                        <tr>
                            <th>Fecha y Hora</th>
                            <th>Doctor</th>
                            <th>Consultor</th>
                           

                        </tr>
                    </thead>

                    <tbody>

                        @foreach($citas as $cita)

                            <tr>
                                <td>{{ $cita->FyHinicio }}</td>

                                @foreach($doctores as $doctor)
                                    @if($cita->id_doctor == $doctor->id)
                                    <td>{{ $doctor->name }}</td>

                                        @foreach($consultorios as $consultorio)
                                            @if($doctor->id_consultorio == $consultorio->id)
                                                <td>{{ $consultorio->consultorio }}</td>

                                            @endif


                                        @endforeach

                                    @endif

                                @endforeach()

                             
                            
                            </tr>
                        
                        @endforeach

                    
                    </tbody>

                </table>

            </div>

        
        </div>

    </section>

</div>

@endsection