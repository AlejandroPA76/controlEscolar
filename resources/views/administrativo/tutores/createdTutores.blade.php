@extends('layouts.dashboard')

@section('content')
    

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

 <script> 
    ///script donde se agregaran campos para agregar mas de un alumno 
var contador=1;   
  $(document).ready(function() { 
     $("#add_alu").click(function(){

        contador = contador+1;
         
/////////CODIGO BIEEEEEEEEEEEEEEEEEEEEEEEEEEEEN

       

           $(this).before('<div><hr><h4>Datos del alumno '+contador+'</h4><label>Nombre del alumno:</label><input type="text" id="name_'+ contador+'" name="nombrealumno[]" placeholder="Ingrese el nombre" class="form-control"/><div class="form-row"><div class="form-group col-md-6"> <label >Primer apellido:</label><input type="text"id="apellido_p" name="apellido_p_a[]" placeholder="ingrese el apellido paterno" class="form-control" /></div><div class="form-group col-md-6"><label >Segundo apellido:</label><input type="text"id="apellido_m" name="apellido_m_a[]" placeholder="ingrese el apellido materno" class="form-control" /></div></div><div class="form-group ml-0"><label>Matricula del alumno</label><input type="text" class="form-control" name="matricula[]" id="matricula" placeholder="ingrese la matricula"></div> <button type="button" class="delete_alu btn btn-outline-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-x" viewBox="0 0 16 16"><path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/><path fill-rule="evenodd" d="M12.146 5.146a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z"/></svg></button><div</div>');


    });
    $(document).on('click', '.delete_alu', function(){ 
      contador = contador-1; 
      $(this).parent().remove(); 
    }); 
}); 
     </script> 

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
                <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre" autofocus value="{{old('nombre')}}">
                @if ($errors->has('nombre'))
                    <span class="error text-danger" for="input-nombre">{{ $errors->first('nombre') }}</span>
                  @endif
                  </div>

                      <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="apellido_p">Primer apellido</label>
                            <input type="text" class="form-control" name="apellido_p" placeholder="ingrese el apellido materno" value="{{old('apellido_p')}}">
                            @if ($errors->has('apellido_p'))
                            <span class="error text-danger" for="input-apellido_p">{{ $errors->first('apellido_p') }}</span>
                            @endif
                          </div>
                          
                          <div class="form-group col-md-6">
                            <label for="apellido_m">Segundo apellido</label>
                            <input type="text" class="form-control" name="apellido_m" placeholder="ingrese el apellido paterno" value="{{old('apellido_m')}}">
                            @if ($errors->has('apellido_m'))
                            <span class="error text-danger" for="input-apellido_m">{{ $errors->first('apellido_m') }}</span>
                            @endif
                          </div>
                        </div>

                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="email"> Usuario</label>
                            <input type="text" class="form-control" name="email" placeholder="por ej: nombre@apellido" value="{{old('email')}}">
                            @if ($errors->has('email'))
                            <span class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                            @endif
                          </div>
                          
                          <div class="form-group col-md-6">
                            <label for="password"> Contraseña</label>
                            <input type="password" class="form-control" name="password" placeholder="Crea una contraseña" value="{{old('password')}}">
                            @if ($errors->has('password'))
                            <span class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                            @endif
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
                <input type="text" class="form-control" name="nombrealumno[]" placeholder="Ingrese el nombre" autofocus value="{{old('nombrealumno')}}">
                @if ($errors->has('nombre'))
                    <span class="error text-danger" for="input-nombre">{{ $errors->first('nombre') }}</span>
                  @endif
                  </div>

                      <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="apellido_p_a">Primer apellido</label>
                            <input type="text" class="form-control" name="apellido_p_a[]" placeholder="ingrese el apellido materno" value="{{old('apellido_p_a')}}">
                            @if ($errors->has('apellido_p'))
                            <span class="error text-danger" for="input-apellido_p">{{ $errors->first('apellido_p') }}</span>
                            @endif
                          </div>
                          
                          <div class="form-group col-md-6">
                            <label for="apellido_m_a">Segundo apellido</label>
                            <input type="text" class="form-control" name="apellido_m_a[]" placeholder="ingrese el apellido paterno" value="{{old('apellido_m_a')}}"> 
                            @if ($errors->has('apellido_m'))
                            <span class="error text-danger" for="input-apellido_m">{{ $errors->first('apellido_m_a') }}</span>
                            @endif
                          </div>
                      </div>

                          <div class="form-group ml-0">
                            <label>Matricula del alumno</label>
                            <input type="text" class="form-control" name="matricula[]" placeholder="ingrese el apellido paterno" value="{{old('matricula')}}">
                            @if ($errors->has('matricula'))
                            <span class="error text-danger" for="input-matricula">{{ $errors->first('matricula') }}</span>
                            @endif 
                          </div>

                          <div class="button">
                            <button type="button" id="add_alu" class="btn btn-secondary">agregar alumno</button>
                        </div>
                        <br>
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


     