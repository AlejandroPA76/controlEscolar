@extends('layouts.dashboard')

@section('content')

<div class="container-fluid mt-3">

  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido paterno</th>
      <th scope="col">Apellido materno</th>
      <th scope="col">Usuario</th>
      {{-- <th scope="col">Rol</th> --}}
      <th scope="col">fecha de creacion</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <h5>Informacion del tutor</h5>
      <th scope="row">{{ $tutor->id }}</th>
      <td>{{ $tutor->nombre }}</td>
      <td>{{ $tutor->apellido_p }}</td>
      <td>{{ $tutor->apellido_m }}</td>
      {{-- <td>{{ $users->email }}</td> --}}
      <td> @forelse ($tutor->roles as $role)
      
      <span class="badge rounded-pill bg-success text-white">{{$role->name}}</span>    
      @empty
      <span class="badge bg-danger bg-danger">Sin asignar rol</span>    
      
      @endforelse
    </td>
      <td>{{ $tutor->created_at }}</td>
    </tr>
  </tbody>
</table>

</div>
@endsection