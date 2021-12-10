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
        <div class="ml-1">
          <h4>Docentes</h4>
        </div>
          <div class="ml-">
            <a class="btn btn-success btn-md ml-4 " href="{{ route('admin.createdDocentes')}}">Crear</a>
          </div>
          <div class="table-responsive mt-3">
            <table class="table">
              {{-- encabezado --}}
              <thead class="text primary">
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido paterno</th>
                <th>Apellido materno</th>
                <th>Usuario</th>
                <th>Creado</th>
                <th class="text-right" >Acciones</th>
              </thead>
              {{-- cuerpo --}}
              <tbody>
                @foreach ($docentes as $docente)
                <tr>
                  <td>{{$docente->id}}</td>
                  <td>{{$docente->nombre}}</td>
                  <td>{{$docente->apellido_p}}</td>
                  <td>{{$docente->apellido_m}}</td>
                  <td>{{$docente->usuario}}</td>
                  <td>{{$docente->created_at}}</td>
                  <td>
                    <a class="btn btn-info"><i class="material-icons" href="{{ route('admin.showDocentes', $docente->id) }}">Ver</a>
                        {{-- podemo usar el titulo del procto paara que se muestre en la url en lugar del id como se obe¿serva en la siguiente linea  se hace junto con el parametro de las rutas--}}
                        {{-- <a class="btn btn-link" href="{{ route('docentes.show', ['docente' => $docente->title]) }}">Ver</a> --}}
                        <a class="btn btn-warning"><i class="material-icons" href="{{ route('admin.editDocentes', $docente->id) }}">Editar</a>

                      <form method="POST" class="d-inLine" action="{{ route('admin.destroyDocentes', $docente->id) }}">
                         @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" class="material-icons">
                          <i class="material-icons">Borrar</i>
                        </button>
                      </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer mr-auto">
          {{$docentes->links()}}
      </div>
      </div>
    </div>
  </div>
</div>
@endsection