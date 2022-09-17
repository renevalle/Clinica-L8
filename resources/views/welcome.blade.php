<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Clinica</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="http://localhost/clinica-l8/public/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://localhost/clinica-l8/public/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="http://localhost/clinica-l8/public/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="http://localhost/clinica-l8/public/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="http://localhost/clinica-l8/public/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="http://localhost/clinica-l8/public/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="http://localhost/clinica-l8/public/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="http://localhost/clinica-l8/public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="http://localhost/clinica-l8/public/bower_components/bootstrap-daterangepicker/daterangepicker.css">

  <!--DataTables-->
  <link rel="stylesheet" href="http://localhost/clinica-l8/public/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="http://localhost/clinica-l8/public/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
 
  <!--FullCalendar-->
  <link rel="stylesheet" href="http://localhost/clinica-l8/public/bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="http://localhost/clinica-l8/public/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">

    <!--Selecct 2-->
    <link rel="stylesheet" href="http://localhost/clinica-l8/public/bower_components/select2/dist/css/select2.min.css">
 

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini login-page">
    
  


  <!--si se autentico el usuario-->
  @if(Auth::user())
  <div class="wrapper">
    @include('modulos.cabecera')
    <!--no se incluyo plantailla en el modulo porque se incluye aqui directamente-->

    @if(auth()->user()->rol == "Secretaria")

    @include('modulos.menuSecretaria')

    @elseif(auth()->user()->rol == "Doctor")

      @include('modulos.menuDoctor')

    @elseif(auth()->user()->rol == "Paciente")

      @include('modulos.menuPaciente')

    @else

      @include('modulos.menuAdministrador')

    @endif

    @yield('content')
    </div>
  @else

    @yield('contenido')

  @endif
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="http://localhost/clinica-l8/public/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="http://localhost/clinica-l8/public/bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.7 -->
  <script src="http://localhost/clinica-l8/public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Morris.js charts -->
  <script src="http://localhost/clinica-l8/public/bower_components/raphael/raphael.min.js"></script>
  <script src="http://localhost/clinica-l8/public/bower_components/morris.js/morris.min.js"></script>
  <!-- Sparkline -->
  <script src="http://localhost/clinica-l8/public/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="http://localhost/clinica-l8/public/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="http://localhost/clinica-l8/public/bower_components/moment/min/moment.min.js"></script>
  <script src="http://localhost/clinica-l8/public/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- datepicker -->
  <script src="http://localhost/clinica-l8/public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- Slimscroll -->
  <script src="http://localhost/clinica-l8/public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="http://localhost/clinica-l8/public/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="http://localhost/clinica-l8/public/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="http://localhost/clinica-l8/public/dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="http://localhost/clinica-l8/public/dist/js/demo.js"></script>

  <!--DataTables-->
  <script src="http://localhost/clinica-l8/public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="http://localhost/clinica-l8/public/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="http://localhost/clinica-l8/public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

  <!--FullCalendar-->
  <script src="http://localhost/clinica-l8/public/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
  <script src="http://localhost/clinica-l8/public/bower_components/fullcalendar/dist/locale/es.js"></script>
  <script src="http://localhost/clinica-l8/public/bower_components/moment/moment.js"></script>

   <!--Select 2-->
   <script src="http://localhost/clinica-l8/public/bower_components/select2/dist/js/select2.js"></script>

  <!--traduccion de las tablas al espaniol-->
  <script type="text/javascript">

    $(".table").DataTable({

      "language":{

      "sSearch": "Buscar",
      "sEmptyTable":"No hay datos en la tabla",
      "sZeroRecords":"No se encontraron resultados",
      "sInfo":"Mostrando registros del _START_ al _END_ de un total _TOTAL_",
      "SinfoEmpty":"Mostrando regiatros del 0 al 0 de n tota de 0",
      "sInfoFieltered":"(filtrando de un total de _MAX_ registrados)",
      "oPaginate":{
        "sFirst":"Primero",
        "sLast":"Ultimo",
        "sNext":"Siguiente",
        "sPrevious":"Anterior",
    },

    "sLoadingRecords":"Cargando...",
    "sLengthMenu":"Mostrar _MENU_ registros"
      }
    });

    $('#select2').select2();/**para implementar el select2 al paciente en citas.blade.php */

  </script>

  <!--mensaje  de modal de avisos de registros-->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('Registrado') == 'Si')

      <script type="text/javascript">

        Swal.fire(
          'El docotor a sido Registrado', '', 'success'
        )

      </script>

    @elseif(session('Agregado') == 'Si')

      <script type="text/javascript">

        Swal.fire(
          'El Paciente a sido Registrado', '', 'success'
        )

      </script>

    @elseif(session('actualizadoP') == 'Si')

        <script type="text/javascript">

          Swal.fire(
            'El Paciente a sido Actualizado', '', 'success'
          )

        </script>

    @elseif(session('SecretariaCreada') == 'Si')

        <script type="text/javascript">

          Swal.fire(
            'La Secretaria ha sido Registrada', '', 'success'
          )

        </script>

   

    @elseif(session('SecretariaEditar') == 'Si')

    <script type="text/javascript">

      Swal.fire(
        'La Secretaria ha sido Actualizada', '', 'success'
      )

    </script>
    

    @endif

    <!--codigo para mostrar un mensaje antes de borrar un doctor-->
  <script type="text/javascript">

      $('.table').on('click', '.EliminarDoctor', function(){
        /*capturar en plantilla la variable Did sea igual a este(this) en su atributo Did*/
        var Did = $(this).attr('Did');

        Swal.fire({

        title: 'Estas seguro de Eliminar?',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar'
        }).then((result) => {
        if (result.isConfirmed) {
          /**Swal.fire(
          'Eliminado!',
          'El Doctor ha sido eliminado.',
          'success'
        )*/
        window.location = "Eliminar-Doctor/"+Did;
       }
      }) 
    })

    $('.table').on('click', '.EliminarPaciente', function(){
        /*capturar en plantilla la variable Pid sea igual a este(this) en su atributo Pid*/
        var Pid = $(this).attr('Pid');
        /**guardar una variable lo que nos traiga de atributo paciente */
        var Paciente = $(this).attr('Paciente');

        Swal.fire({

        title: 'Estas seguro de Eliminar a: '+Paciente+'?',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar'
        }).then((result) => {
        if (result.isConfirmed) {
        
        window.location = "Eliminar-Paciente/"+Pid;
       }
      }) 
    })

    $('.table').on('click', '.EliminarSecretaria', function(){
        /*capturar en plantilla la variable Did sea igual a este(this) en su atributo Did*/
        var Sid = $(this).attr('Sid');

        Swal.fire({

        title: 'Estas seguro de Eliminar?',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar'
        }).then((result) => {
        if (result.isConfirmed) {
        window.location = "Eliminar-Secretaria/"+Sid;
       }
      })
    }) 

  </script>


    <?php
      /**explode hace separar una cadena de texto y que coloque la variable server  */
      $exp = explode("/", $_SERVER["REQUEST_URI"]);

    ?>
    <!--si la variable exp en su parametro 3 es igual a editarsecretaria entonces
    (abrir u scrip cuando el $()documento este listo ejecute la funcion (id.abrir un modal)-->
    @if($exp[3] == "Editar-Secretaria")
      <script type="text/javascript">
        $(document).ready(function(){
            $('#EditarSecretaria').modal('toggle');
        })
      </script>

    @endif

    @if($exp[3] == "Editar-Doctor")
      <script type="text/javascript">
        $(document).ready(function(){
            $('#editarDoctor').modal('toggle');
        })
      </script>

    @endif

    @if($exp[3] == "Citas")

  <!--TODO LO QUE TENGA QUE VER CON EL CALENDARIO-->
  <script type="text/javascript">

    var date = new Date();
    var d = date.getDate(),/**dia */
      m = date.getMonth(),/**mes */
      a = date.getFullYear()/**anio */

      /**donde tengas el id calendar nos implemente el pluying fullcalendar */
    $('#calendario').fullCalendar({

      defaultView: 'agendaWeek', /**agendaweek-> para ver el calendario como agenda */
      hiddenDays : [0,6],/**ocultar sabado y domigo */

      /**eventos para mostrar las citas en el calendarios */
      events:[

        @foreach($citas as $cita)

          @if(auth()->user()->rol == "Doctor")

            {

              id: '{{ $cita->id }}',
              title: '{{ $cita->PAC->name }}',
              start: '{{ $cita->FyHinicio }}',
              end: '{{ $cita->FyHfinal }}'

            }, 

          @elseif(auth()->user()->rol == "Paciente")

          /**solo para mostrar el nombre del paciente */
          @if($cita->id_paciente == auth()->user()->id)
          {

            id: '{{ $cita->id }}',
            title: '{{ $cita->PAC->name }}',
            start: '{{ $cita->FyHinicio }}',
            end: '{{ $cita->FyHfinal }}'

          },
          @else

          {

          id: '{{ $cita->id }}',
          title: 'No Disponible',
          start: '{{ $cita->FyHinicio }}',
          end: '{{ $cita->FyHfinal }}'

          }, 

          @endif

          @endif

        @endforeach

      ],

        /**si hora es igual a distinto de nada */
      @if($horarios != null)

        scrollTime: "{{ $hora->horaInicio }}",
        minTime: "{{ $hora->horaInicio }}",/**tiempo minimo, principio */
        maxTime: "{{ $hora->horaFin }}",/**hasta que hora termina el dia */

        @else

        scrollTime: null,/** */
        minTime: null,/**tiempo minimo, principio */
        maxTime: null,/**hasta que hora termina el dia */

      @endif
    
      dayClick:function(date,jsEvent,view){

        var fecha = date.format();/*variable fecha es igual a dato formato */
        var hora = ("01:00:00").split(":");/**variable hora con su atributo y separado(split) por : */

        fecha = fecha.split("T");/**para separar con un a ","*/

        var hora1 =(fecha[1]).split(":");/** varible en su indice lo separe(split) por : */

        HI = parseFloat(hora1[0]);/**parsefloat de lo que traiga hora1 del indice */
        HA = parseFloat(hora[0]);/**parsefloat de lo que traiga hora del indice */

        var horaFinal = HI + HA;/** sumar la HI y HA */

        if(horaFinal < 10 && horaFinal > 0){/** preguntarsi la hola final es < o > */
          var HF = "0" + horaFinal+ ":00:00";/*menor a 10* entonces seria poner el 0 antes al numero"1,2,3,4,5,6,7,8,9. + HF + 00:00 */

        }else{

          var HF = horaFinal+":00:00";/*mayor a 10* solo va a traer la HF + 00:00 */
        }

        n = new Date();
        y = n.getFullYear();
        m = n.getMonth() + 1;
        d = n.getDate();

        if(m < 10){/**solucion para mostrar el dia actual*/

          M = "0"+m;

          if(d < 10){

            D = "0"+d;

            diaActual = y +"-"+M+"-"+D;

          }else{

          diaActual = y +"-"+M+"-"+d;/**dia hoy es igual al anio + 0 + mes + dia */
          }
        }else{

          diaActual = y +"-"+m+"-"+d;

        }

        if(diaActual<= fecha[0]){/**si dia actual es menos o igual a fecha en su indice*/

          if("{{ auth()->user()->rol }}" == "Doctor"){
              $('#CitaModal').modal();/**variable se encuentra en Citas.Blade.php*/
            }else if("{{ auth()->user()->rol }}" == "Paciente"){
              $('#Cita').modal();/**variable se encuentra en Citas.Blade.php*/
            }       
        }
        /**para mostrar los datos al doctor al momento de hacer una cita */
        $('#Fecha').val(fecha[0]);/**variable Fecha esta en Citas.Blade.php, fecha mostrada en el calendario de citas*/
        $('#hora').val(hora1[0]+":00:00");/**variable hora1 con el indice 0 se concatena los 0 para una mejor lectura*/
        $('#FyHinicio').val(fecha[0]+" "+hora1[0]+":00:00");/**variable fecha en su indice 0 se concatena con una separacion + ^*/
        $('#FyHfinal').val(fecha[0]+" "+HF);/**variable Fecha en su indice o se concatena con las variable HF para la hora fin de la cita*/

        /**para mostrar los datos al paciente al momento de pedir una cita */
        $('#FechaP').val(fecha[0]);/**variable Fecha esta en Citas.Blade.php, fechaP mostrada en el calendario de citas*/
        $('#horaP').val(hora1[0]+":00:00");/**variable horaP con el indice 0 se concatena los 0 para una mejor lectura*/
        $('#FyHinicioP').val(fecha[0]+" "+hora1[0]+":00:00");/**variable fecha en su indice 0 se concatena con una separacion + ^*/
        $('#FyHfinalP').val(fecha[0]+" "+HF);/**variable Fecha en su indice o se concatena con las variable HF para la hora fin de la cita*/

      },
      /**evento click enviando los parametros  */
      eventClick:function(calEvent,jsEvent, view){
        /** si la autentificacion del usuario en su roll es igual al doctor */
        if("{{ auth()->user()->rol }}" == "Doctor"){
          /** que abra el modal con la variable de EventoModal que tambien esta en citas.blade*/
          $('#EventoModal').modal();

        }
        /** donde tenemos el id de paciente que esta en el h4 de EventoModal en u html colocamos lo que traiga calevent en titulo*/
        $('#paciente').html(calEvent.title);

        /**no tenemos el idcita en su val lo que trae calevent en su id */
        $('#idCita').val(calEvent.id);

      }

    });

    
  </script>
@endif
</body>
</html>
