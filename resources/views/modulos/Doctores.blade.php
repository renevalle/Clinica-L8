@extends('welcome')

@section('content')

<div class="content-wrapper">
    <section class="content-header">

        <h1>Gestor de Doctores</h1>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header">
                <!-- primari = boton azul, lg = grande,   para agregar un modal  -->
                <button class="btn btn-primary btn-lg " data-toggle="modal" 
                data-target="#CrearDoctor">Crear Doctor</button>

            </div>

            <div class="box-body">
                
                <table class="table table-bordered table-hover table-striped ">

                    <thead>
                        
                        <tr>

                            <th>ID</th>
                            <th>Nombre y Apellido</th>
                            <th>Consultorio</th>
                            <th>Email</th>
                            <th>Documento</th>
                            <th>Telefono</th>
                            <th>Accion</th>

                        </tr>
                    </thead>
                        
                    <tbody>

                        @foreach($doctores as $doctor)

                            @if($doctor->rol == "Doctor")

                                <tr>
                                <td>{{ $doctor->id }}</td>
                                <td>{{ $doctor->name }}</td>
                                <td>{{ $doctor->CON->consultorio }}</td>
                                <td>{{ $doctor->email }}</td>                             
                                <td>{{ $doctor->documento }}</td>
                                
                                    @if($doctor->Telefono == "")
                                <td>{{ $doctor->telefono }}</td>
                                    @else
                                <td>sin numero</td>
                                    @endif

                                <td>
                                    
                                    <a href="{{ url('editar-doctor/'.$doctor->id) }}"> <!--esto se le agrego-->
                                    <button data-target="#editarDoctor" class=" btn btn-success"><i class="fa fa-pencil"></i></button>
                                    </a>                                  
                                    <button class="btn btn-danger EliminarDoctor" Did="{{ $doctor->id }}"><i class="fa fa-trash"></i></button>
                                </td>

                            @endif

                        @endforeach
                        
                        </tr>
                    </tbody>

                </table>

            </div>     

        </div>

    </section>

</div>
<!--
<div id="CrearDoctor" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
                @csrf
                <!--para que laravel nos permita agregar formularios
                <div class="modal-body">                  
                   <div class="box-body">
                        <div class="form-group">
                            <h4>Nombre y Apellido:</h4>
                            <input type="text" class="form-control input-lg" name="name" required>
                        </div>
                        <div class="form-group">
                            <h4>sexo:</h4>
                            <select class="form-control input-lg" name="sexo" required="">
                                <option value="">Seleccionar...</option>
                                <option value="Mujer">Mujer</option>
                                <option value="Hombre">Hombre</option>
                                <option value="Otros">Otros</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <h4>Consultorio:</h4>
                            <select class="form-control input-lg" name="id_consultorio" requered="">
                                <option value="">Seleccionar...</option>
                                <!--la variable Sconsultorio la tranforme como singular
                                y para mostrar las consultorioas de la base en el aplicativo
                                @foreach($consultorios as $consultorio)
                                                <!--sea lo que traiga la variable $consultorio en su id, y que traiga de la columna consultorio
                                <option value="{{ $consultorio->id }}">{{ $consultorio->consultorio }}</option>
                                @endforeach                              
                           </select>
                            </div>
                        <div class="form-group">
                            <h4>Email:</h4>
                            <!--{{old('emal')}}=> para saber el ultimo email que se puso
                            <input type="email" class="form-control input-lg" name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="alert alert-danger">El Email ya Existe</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <h4>Contraseña:</h4>
                            <input type="text" class="form-control input-lg" name="password" requerid="">
                        </div>
        <div class=row>   
                        <div class="col-m3 mb-3">
                            <h4>Telefono:</h4>
                            <input type="text" class="form-control " name="telefono">
                        </div>                       
                        <div class="col-m3 mb-3">
                            <h4>Documento</h4>
                            <input type="text" class="form-control " name="documento">
                        </div>
        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Crear</button>
                    <!--                                            para cerrar el modal
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>    
</div>
-->
<!-- Vertical form modal -->
<div id="CrearDoctor" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Crear Doctor</h2>
            </div>
            <form method="post">
               @csrf
                <!--para que laravel nos permita agregar formularios en la vista-->
                <div class="modal-body">                  
                   <div class="box-body">

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Nombre y Apellido:</label>
                                    <input type="text" placeholder="Nombre" class="form-control input-lg" name="name" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>sexo:</label>
                                    <select class="form-control input-lg" name="sexo" required="">
                                        <option value="">Seleccionar...</option>
                                        <option value="Mujer">Mujer</option>
                                        <option value="Hombre">Hombre</option>
                                        <option value="Otros">Otros</option>
                                    </select>
                                </div>

                                    <div class="col-sm-6">
                                        <label>Consultorio:</label>
                                        <select class="form-control input-lg" name="id_consultorio" requered="">
                                            <option value="">Seleccionar...</option>
                                            <!--la variable Sconsultorio la tranforme como singular
                                            y para mostrar las consultorioas de la base en el aplicativo-->
                                            @foreach($consultorios as $consultorio)
                                                            <!--sea lo que traiga la variable $consultorio en su id, y que traiga de la columna consultorio-->
                                            <option value="{{ $consultorio->id }}">{{ $consultorio->consultorio }}</option>
                                            @endforeach                              
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                        <label>Email:</label>
                                        <!--{{old('emal')}}=> para saber el ultimo email que se puso-->
                                        <input type="email" placeholder="Email" class="form-control input-lg" name="email" value="{{ old('email') }}">
                                            @error('email')
                                            <div class="alert alert-danger">El Email ya Existe</div>
                                                @enderror
                                </div>  

                                <div class="col-sm-6">
                                    <label>Contraseña:</label>
                                    <input type="text" placeholder="Contraseña" class="form-control input-lg" name="password" requerid="">
                                </div>
                            </div>
                        </div>
       
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Telefono:</label>
                                    <input type="text" placeholder="Telefono" class="form-control input-lg" name="telefono">
                                </div> 

                                <div class="col-sm-6">
                                    <label>Documento</label>
                                    <input type="text" placeholder="Documento" class="form-control input-lg" name="documento">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Crear</button>
                        <!--                                            para cerrar el modal-->
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                    </div>
                 
                </div>
            </form>
        </div>
    </div>    
</div>
    <!-- /vertical form modal -->

<!-- Vertical form modal -->
<div id="editarDoctor" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Crear Doctor</h2>
            </div>
            <form method="post">
               @csrf
                <!--para que laravel nos permita agregar formularios en la vista-->
                <div class="modal-body">                  
                   <div class="box-body">

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Nombre y Apellido:</label>
                                    <input type="text" placeholder="Nombre" class="form-control input-lg" name="name" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>sexo:</label>
                                    <select class="form-control input-lg" name="sexo" required="">
                                        <option value="">Seleccionar...</option>
                                        <option value="Mujer">Mujer</option>
                                        <option value="Hombre">Hombre</option>
                                        <option value="Otros">Otros</option>
                                    </select>
                                </div>

                                    <div class="col-sm-6">
                                        <label>Consultorio:</label>
                                        <select class="form-control input-lg" name="id_consultorio" requered="">
                                            <option value="">Seleccionar...</option>
                                            <!--la variable Sconsultorio la tranforme como singular
                                            y para mostrar las consultorioas de la base en el aplicativo-->
                                            @foreach($consultorios as $consultorio)
                                                            <!--sea lo que traiga la variable $consultorio en su id, y que traiga de la columna consultorio-->
                                            <option value="{{ $consultorio->id }}">{{ $consultorio->consultorio }}</option>
                                            @endforeach                              
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                        <label>Email:</label>
                                        <!--{{old('emal')}}=> para saber el ultimo email que se puso-->
                                        <input type="email" placeholder="Email" class="form-control input-lg" name="email" value="{{ old('email') }}">
                                            @error('email')
                                            <div class="alert alert-danger">El Email ya Existe</div>
                                                @enderror
                                </div>  

                                <div class="col-sm-6">
                                    <label>Contraseña:</label>
                                    <input type="text" placeholder="Contraseña" class="form-control input-lg" name="password" requerid="">
                                </div>
                            </div>
                        </div>
       
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Telefono:</label>
                                    <input type="text" placeholder="Telefono" class="form-control input-lg" name="telefono">
                                </div> 

                                <div class="col-sm-6">
                                    <label>Documento</label>
                                    <input type="text" placeholder="Documento" class="form-control input-lg" name="documento">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Crear</button>
                        <!--                                            para cerrar el modal-->
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                    </div>
                 
                </div>
            </form>
        </div>
    </div>    
</div>
    <!-- /vertical form modal -->
@endsection