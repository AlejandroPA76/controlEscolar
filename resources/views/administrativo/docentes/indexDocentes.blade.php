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
        <div class="card-header card-header-primary">
          <h4 class="card-title">Docentes</h4>
          <p class="card-category">Docentes registrados</p>
          <div class="text-left">
            <a href="{{ route('admin.createdDocentes') }}" class="btn btn-success">Añadir docente</a>
          </div>
        </div>
      <div class="card-body"> 
        @if (session('success'))
        <div class="alert alert-primary" role="success">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
              {{ session('success') }}
        </div>
        @endif

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

                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#model-delete-{{$docente->id}}">
                        Eliminar
                        </button>
                  </td>
                  @include('administrativo.docentes.delete')
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-body">
          {{$docentes->links()}}
      </div>
      </div>
    </div>
  </div>
</div>
@endsection