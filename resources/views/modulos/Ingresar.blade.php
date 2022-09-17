@extends('welcome')

@section('contenido')

<div class="login-box">
    <!--caja de login-->
    <div class="login-logo">
        <!--logo ya sea texto o imagen-->
        <b>Clinica Medica</b>
        <!--en este caso texto-->
    </div>

    <div class="login-box-body">
        <!--caja de ingreso de login-->
        <p class="login-box-msg">Ingresar al sistema</p>
        <!--mensaje de la caja de texto-->

            <!--formulario POST para envio de datos-->
        <form method="post" action="{{ route('login') }}">
        
             @csrf
            <!--poner en todo slos formularios sino laravel no va a validar el formulario para poder verlo-->

            <div class="form-group has-feedback">
                <!--formulario de grupo -->
                <input type="email" name="email" class="form-control" required="" value="">
                <!--caja de correo-->

                @error('email')
                <br>
                <div class="alert alert-danger"> Email o Password Incorrecto</div>

                @enderror

                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                <!--icono en la caja de user-->
            </div>

            <div class="form-group has-feedback">
                <!--formulario de grupo -->
                <input type="password" name="password" class="form-control" required="" value="">
                <!--caja texto de password-->

                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <!--icono de candado-->
            </div>

            <div class="row">
                <!--fila-->
                <div class="col-xs-12">
                    <!--columnas 12/12-->
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                    <!--boton ingresar-->
                </div>
            </div>
        </form>
    </div>
</div>




@endsection