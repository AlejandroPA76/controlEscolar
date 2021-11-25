@extends('layouts.master')

@section('content')
    

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!-- no additional media querie or css is required -->
<div class="container mt-2">
  <div class="row justify-content-center align-items-center" style="">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h4>Datos del Tutor</h4>
          <form action="{{route ('admin.storeTutores')}}" method="post">
            @csrf

            <div class="form-group">
              <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre" autofocus>
                  </div>

                      <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="apellido_p">Primer apellido</label>
                            <input type="text" class="form-control" name="apellido_p" placeholder="ingrese el apellido materno">
                          </div>
                          
                          <div class="form-group col-md-6">
                            <label for="apellido_m">Segundo apellido</label>
                            <input type="text" class="form-control" name="apellido_m" placeholder="ingrese el apellido paterno">
                          </div>
                        </div>

                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="usuario"> Usuario</label>
                            <input type="text" class="form-control" name="usuario" placeholder="por ej: nombre@apellido">
                          </div>
                          
                          <div class="form-group col-md-6">
                            <label for="contraseña"> Contraseña</label>
                            <input type="password" class="form-control" name="contraseña" placeholder="Crea una contraseña">
                          </div>
                        </div>
                        
                        <br>
                        {{-- estudianate --}}
                        <h4>Datos del alumno</h4>
            <div class="form-group">
              <label for="nombrealumno">Nombre del alumno</label>
                <input type="text" class="form-control" name="nombrealumno" placeholder="Ingrese el nombre" autofocus>
                  </div>

                      <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="apellido_p_a">Primer apellido</label>
                            <input type="text" class="form-control" name="apellido_p_a" placeholder="ingrese el apellido materno">
                          </div>
                          
                          <div class="form-group col-md-6">
                            <label for="apellido_m_a">Segundo apellido</label>
                            <input type="text" class="form-control" name="apellido_m_a" placeholder="ingrese el apellido paterno">
                          </div>
                      </div>

                          <div class="form-group ml-0">
                            <label>Matricula del alumno</label>
                            <input type="text" class="form-control" name="matricula_a" placeholder="ingrese el apellido paterno">
                          </div>

                      <div class="form-row">
                      
                        <button type="submit" class="btn btn-primary">Registrar</button>
                  </div>

                  </form> 
               </div>
            </div>
          </div>
        </div>
      </div>
      @endsection