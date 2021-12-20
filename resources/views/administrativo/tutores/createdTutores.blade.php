@extends('layouts.dashboard')

@section('content')
    

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

<!-- no additional media querie or css is required -->
<div class="container-fluid mt-3">
  <div class="row justify-content-center align-items-center" style="">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h4>Datos del Tutor</h4>
          <form action="{{route ('admin.storeTutores')}}" method="post">
            @csrf

            {{-- <div class="form-group">
              <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" placeholder="Ingrese el nombre" autofocus>
                  </div> --}}
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
                            <label for="email"> Usuario</label>
                            <input type="text" class="form-control" name="email" placeholder="por ej: nombre@apellido">
                          </div>
                          
                          <div class="form-group col-md-6">
                            <label for="password"> Contraseña</label>
                            <input type="password" class="form-control" name="password" placeholder="Crea una contraseña">
                          </div>
                        </div>
                        <input type="hidden" name="roles" value="3">
                        
                       {{-- <div class="row">
                          <label for="roles" class="col-sm-2 col-form-label">Roles</label>
                          <div class="col-sm-7">
                              <div class="form-group">
                                  <div class="tab-content">
                                      <div class="tab-pane active">
                                          <table class="table">
                                              <tbody>
                                                  @foreach ($roles as $id => $role)
                                                  <tr>
                                                      <td>
                                                          <div class="form-check">
                                                              <label class="form-check-label">
                                                                  <input class="form-check-input" type="checkbox" name="roles[]"
                                                                      value="{{ $id }}"
                                                                  >
                                                                  <span class="form-check-sign">
                                                                      <span class="check"></span>
                                                                  </span>
                                                              </label>
                                                          </div>
                                                      </td>
                                                      <td>
                                                          {{ $role }}
                                                      </td>
                                                  </tr>
                                                  @endforeach
                                              </tbody>
                                          </table>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div> 
--}}
                        
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
                          <div class="button">
                            <button type="button" id="add_alu">agrear alumno</button>
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


     <script type="text/javascript">
   
       $(document).ready(function() {
    $("#add_alu").click(function(){
        var contador = $("input[type='nombre_alumno']").length;

        $(this).before('<div><label for="nombrealumno'+ contador +'">holaa:</label><input type="text" id="nombrealumno'+ contador +'" name="nombrealumno[]"/><button type="button" class="delete_email">Del</button></div>');
    });

    $(document).on('click', '.delete_email', function(){
        $(this).parent().remove();
    });
});


     </script>