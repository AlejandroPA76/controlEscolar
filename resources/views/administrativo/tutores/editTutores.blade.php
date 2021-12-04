@extends('layouts.dashboard')

@section('content')
<div class="container-fluid mt-3">
  <div class="row justify-content-center align-items-center" style="">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h4>Editar del Tutor</h4>
          <form method="POST" action ="{{ route('admin.updateTutores',$tutor->id) }}">
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

                        <div class="row">
                          <label for="name" class="col-sm-2 col-form-label">Agregar rol del usuario</label>
                        <table class="table">
                                    <tbody>
                                        @foreach ($roles as $id => $role)
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="roles[]"
                                                            value="{{ $id }}" {{ $tutor->roles->contains($id) ? 'checked' : ''}}
                                                        >
                                                        <span class="form-check-sign">
                                                            <span class="check" value=""></span>
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

                        <div class="form-row mt-2">
                      
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