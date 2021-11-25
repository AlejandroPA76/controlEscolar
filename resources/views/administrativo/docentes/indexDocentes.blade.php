@extends('layouts.master')

@section('content')
    

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!-- no additional media querie or css is required -->
<div class="container mt-3">
  <div class="row" style="height:100vh">
    <div class="col">
      <div class="card">
        
      <div class="card-body"> 
        <div class="ml-3">
          <h4>docentees</h4>
        </div>
          <div class="ml-2">
            <a class="btn btn-success btn-md ml-4 " href="{{ route('admin.createdDocente')}}">Crear</a>
          </div>
          <div class="table-responsive">
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
                    <a class="btn btn-link" href="{{ route('admin.showdocentees', $docente->id) }}">Ver</a>
                        {{-- podemo usar el titulo del procto paara que se muestre en la url en lugar del id como se obe¿serva en la siguiente linea  se hace junto con el parametro de las rutas--}}
                        {{-- <a class="btn btn-link" href="{{ route('docentes.show', ['docente' => $docente->title]) }}">Ver</a> --}}
                        <a class="btn btn-link" href="{{ route('admin.editdocentees', ['docente'=>$docente->id]) }}">Editar</a>

                      <form method="POST" class="d-inLine" action="{{ route('admin.destroydocentees', $docente->id) }}">
                         @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link">Borrar</button>
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