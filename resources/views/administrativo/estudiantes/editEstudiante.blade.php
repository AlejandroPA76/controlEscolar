@extends('layouts.dashboard')

@section('content')
    

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!-- no additional media querie or css is required -->
<div class="container-fluid mt-3">
  <div class="row" style="height:100vh">
    <div class="col">
      <div class="card">
        <div class="card-body">   
          <h1>Editar estudiantes</h1>
          
          <form method="POST" action ="{{ route('admin.updateEstudiantes', $estudiante->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
              <label >Nombre</label>
                <input type="text" class="form-control" name="nombre" 
                value="{{$estudiante->nombre}}">
                  </div>

                      <div class="form-row">
                          <div class="form-group col-md-6">
                            <label>Primer apellido</label>
                            <input type="text" class="form-control" name="apellido_p" 
                            value="{{$estudiante->apellido_p }}">
                          </div>
                          
                          <div class="form-group col-md-6">
                            <label o_m">Segundo apellido</label>
                            <input type="text" class="form-control" name="apellido_m" 
                            value="{{ $estudiante->apellido_m }}">
                          </div>
                        </div>

                          <div class="form-group col-md-6">
                            <label la"> Matricula</label>
                            <input type="password" class="form-control" name="matricula"  
                            value="{{$estudiante->matricula }}">
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