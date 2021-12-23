@extends('layouts.dashboard')

@section('content')
    

<link href="//maxcdn.bootstdapcdn.com/bootstdap/4.0.0/css/bootstdap.min.css" rel="stylesheet" id="bootstdap-css">
<script src="//maxcdn.bootstdapcdn.com/bootstdap/4.0.0/js/bootstdap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!-- no additional media querie or css is required -->
<div class="container-fluid mt-3">
  <div class="row" style="height:100vh">
    <div class="col">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Tutores</h4>
          @if (empty($tutores))
        <div class="alert alert-warning">
            Aun no esxiste una lista de productos
        </div>
    @else
          <p class="card-category">Tutores registrados</p>
        </div>
      <div class="card-body"> 
        {{-- <div class="ml-3">
          <h4>Tutores</h4>
        </div> --}}
        
          {{-- <div class="ml-2">
            <a class="btn btn-success btn-md ml-4 " href="{{ route('admin.createdTutores')}}">Crear</a>
          </div> --}}

          <div class="row">
            <div class="col-12 text-left">
              <a href="{{ route('admin.createdTutores') }}" class="btn btn-success">Añadir Tutor</a>
            </div>
          </div>
          <br>

          <div class="table-responsive">
            <table class="table">
              {{-- encabezado --}}
              <thead class="text primary">
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido paterno</th>
                <th>Apellido materno</th>
                {{-- <th>Usuario</th> --}}
                {{-- <th>Rol del usuario</th> --}}
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
                  {{-- <td>{{$tutor->usuario}}</td> --}}
                  
                  {{-- <td>
                    @forelse ($tutor->roles as $role)
                        <span class="badge rounded-pill bg-success text-white">{{ $role->name }}</span>

                    @empty
                        <span class="badge bg-danger bg-danger ">No se ha agregado rol</span>
                    @endforelse
                  </td> --}}

                  <td>
                    <a  href="{{ route('admin.showTutores', $tutor->id) }}"
                      class="btn btn-info" ><i class="material-icons">Ver</i></a>
                        {{-- podemo usar el titulo del procto paara que se muestre en la url en lugar del id como se obe¿serva en la siguiente linea  se hace junto con el parametro de las rutas--}}
                        {{-- <a class="btn btn-link" href="{{ route('tutors.show', ['tutor' => $tutor->title]) }}">Ver</a> --}}
                        <a href="{{ route('admin.editTutores', ['tutor'=>$tutor->id]) }}"
                          class="btn btn-warning"><i class="material-icons" >Editar</a>

                      <form method="POST" class="d-inLine" action="{{ route('admin.destroyTutores', $tutor->id) }}">
                         @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
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
        <div class="card-body mr-auto">
          {{$tutores->links()}}
      </div>
      </div>
    </div>
  </div>
</div>
@endif
@endsection