@extends('layouts.master')

@section('content')
    

<link href="//maxcdn.bootstdapcdn.com/bootstdap/4.0.0/css/bootstdap.min.css" rel="stylesheet" id="bootstdap-css">
<script src="//maxcdn.bootstdapcdn.com/bootstdap/4.0.0/js/bootstdap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!-- no additional media querie or css is required -->
<div class="container mt-3">
  <div class="row" style="height:100vh">
    <div class="col">
      <div class="card">
        
      <div class="card-body"> 
        <div class="ml-3">
          <h4>Tutores</h4>
        </div>
          <div class="ml-2">
            <a class="btn btn-success btn-md ml-4 " href="{{ route('admin.createdTutores')}}">Crear</a>
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
                @foreach ($tutores as $tutor)
                <tr>
                  <td>{{$tutor->id}}</td>
                  <td>{{$tutor->nombre}}</td>
                  <td>{{$tutor->apellido_p}}</td>
                  <td>{{$tutor->apellido_m}}</td>
                  <td>{{$tutor->usuario}}</td>
                  <td>{{$tutor->created_at}}</td>
                  <td>
                    <a class="btn btn-link" href="{{ route('admin.showTutores', $tutor->id) }}">Ver</a>
                        {{-- podemo usar el titulo del procto paara que se muestre en la url en lugar del id como se obe¿serva en la siguiente linea  se hace junto con el parametro de las rutas--}}
                        {{-- <a class="btn btn-link" href="{{ route('tutors.show', ['tutor' => $tutor->title]) }}">Ver</a> --}}
                        <a class="btn btn-link" href="{{ route('admin.editTutores', ['tutor'=>$tutor->id]) }}">Editar</a>

                      <form method="POST" class="d-inLine" action="{{ route('admin.destroyTutores', $tutor->id) }}">
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
          {{$tutores->links()}}
      </div>
      </div>
    </div>
  </div>
</div>
@endsection