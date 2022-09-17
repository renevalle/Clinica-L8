@extends('welcome')

@section('contenido')

<selection class="content">

    <center>
       <h1>Seleccione como desea Ingresar al Sistema</h1>
    </center>
     
       <div class="col-lg-3 col-xs-6"><!--columnas 3/12-->
            <div class="small-box" style="background-color: #f781d8; color:white;"><!--caja pequena, color de fondo y color de letras-->

               <div class="inner"><!--contenido dentro del formulario-->
                  <h3>Secretaria</h3><!--H3 es el tamano de la letra-->
                  <p>Inicie Sesion</p><!--(p, b) son etiquetas mas pequenas-->
               </div>
            
                 <div class="icon"><!--icono-->
                   <i class="fa fa-female"></i><!--codigo del icono-->
                </div>

                <a href="Ingresar" class="small-box-footer"><!--pie de pagina de la caja-->
                    Ingresar <i class="fa fa-arrow-circle-right"></i><!--texto mas el icono-->
                </a>

            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <div class="small-box" style="background-color: #bdbdbd; color:white;">

               <div class="inner">
                  <h3>Doctor</h3>
                  <p>Inicie Sesion</p>
               </div>
            
                 <div class="icon">
                   <i class="fa fa-user-md"></i>
                </div>

                <a href="Ingresar" class="small-box-footer">
                    Ingresar <i class="fa fa-arrow-circle-right"></i>
                </a>

            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>Paciente</h3>
                    <p>Inicie Session</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>

                <a href="Ingresar" class="small-box-footer">
                    Ingresar <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <div class="small-box  bg-red">
                <div class="inner">
                    <h3>Administrador</h3>
                    <p>Inicie Seccion</p>
                </div>

                <div class="icon">
                    <i class="fa fa-male"></i>
                </div>

                <a href="Ingresar" class="small-box-footer">
                    Ingresar <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
           
        </div>

</selection>
@endsection