@extends('layouts.dashboard')

@section('content')
    

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!-- no additional media querie or css is required -->
<div class="container-fluid mt-2">
  <div class="row justify-content-center align-items-center" style="">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h4>Datos del docente</h4>
          <form action="{{route ('admin.storeDocentes')}}" method="post">
            @csrf

            <div class="form-group">
              <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre"  placeholder="Ingrese el nombre" autofocus value="{{old('nombre')}}">
                @if ($errors->has('nombre'))
                    <span class="error text-danger" for="input-nombre">{{ $errors->first('nombre') }}</span>
                  @endif
                  </div>

                  <div class="form-group">
                    <label for="matricula">Matricula</label>
                      <input type="text" class="form-control" name="matricula" placeholder="Ingrese la matricula" autofocus value="{{old('matricula')}}">
                      @if ($errors->has('matricula'))
                    <span class="error text-danger" for="input-matricula">{{ $errors->first('matricula') }}</span>
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