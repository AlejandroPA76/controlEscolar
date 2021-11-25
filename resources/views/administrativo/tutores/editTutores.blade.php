@extends('layouts.master')

@section('content')
<div class="container mt-2">
  <div class="row justify-content-center align-items-center" style="">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h4>Datos del Tutor</h4>
          <form method="POST" action ="{{ route('admin.updateTutores', ['tutor'=> $tutor->id]) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
              <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" 
                value="{{$tutor->nombre}}">
                  </div>

                      <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="apellido_p">Primer apellido</label>
                            <input type="text" class="form-control" name="apellido_p" 
                            value="{{$tutor->apellido_p }}">
                          </div>
                          
                          <div class="form-group col-md-6">
                            <label for="apellido_m">Segundo apellido</label>
                            <input type="text" class="form-control" name="apellido_m" 
                            value="{{ $tutor->apellido_m }}">
                          </div>
                        </div>

                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="usuario"> Usuario</label>
                            <input type="text" class="form-control" name="usuario"  
                            value="{{  $tutor->usuario }}">
                          </div>
                          
                          <div class="form-group col-md-6">
                            <label for="contraseña"> Contraseña</label>
                            <input type="password" class="form-control" name="contraseña"  
                            value="{{$tutor->contraseña }}">
                          </div>
                        </div>
                        <br>
                        <div class="form-row">
                      
                          <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                        {{-- estudianate --}}
                  </form> 
               </div>
            </div>
          </div>
        </div>
      </div>

@endsection