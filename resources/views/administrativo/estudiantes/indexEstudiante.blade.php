@extends('layouts.dashboard')

@section('content')
    

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container-fluid mt-3">
  <div class="row" style="height:100vh">
    <div class="col">
      <div class="card">
        
      <div class="card-body"> 
        <div class="">
          <h4>Estudiantes</h4>
        </div>
{{-- 
          <div class="ml-2">
            <a class="btn btn-success btn-md " href="{{ route('admin.createdEstudiantes')}}">Crear</a>
          </div> 
           --}}
          <div class="table-responsive mt-2">
            <table class="table">
              {{-- encabezado --}}
              <thead class="text primary">
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido paterno</th>
                <th>Apellido materno</th>
                <th>Matricula</th>
                <th>Creado</th>
                <th class="text-right" >Acciones</th>
              </thead>
              {{-- cuerpo --}}
              <tbody>
                @foreach ($estudiantes as $estudiante)
                <tr>
                  <td>{{$estudiante->id}}</td>
                  <td>{{$estudiante->nombre}}</td>
                  <td>{{$estudiante->apellido_p}}</td>
                  <td>{{$estudiante->apellido_m}}</td>
                  <td>{{$estudiante->matricula}}</td>
                  <td>{{$estudiante->created_at}}</td>
                  <td>
                    <a href="{{ route('admin.showEstudiantes', $estudiante->id) }}" class="btn btn-info">
                      <i class="material-icons">Ver</i>
                    </a>
                        {{-- podemo usar el titulo del procto paara que se muestre en la url en lugar del id como se obe¿serva en la siguiente linea  se hace junto con el parametro de las rutas--}}
                        {{-- <a class="btn btn-link" href="{{ route('estudiantes.show', ['estudiante' => $estudiante->title]) }}">Ver</a> --}}
                    @can('estudiante_edit')
                        <a class="btn btn-warning" href="{{ route('admin.editEstudiantes',  $estudiante->id) }}">
                      <i class="material-icons">Editar</i>
                    </a>
                    @endcan
                    
                    @can('estudiante_destroy')
                      <form method="POST" class="d-inLine" action="{{ route('admin.destroyEstudiantes',$estudiante->id) }}">
                         @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                           <i class="material-icons">Borrar</i>
                        </button>
                      </form>
                      @endcan
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer mr-auto">
          {{$estudiantes->links()}}
      </div>
      </div>
    </div>
  </div>
</div>
@endsection