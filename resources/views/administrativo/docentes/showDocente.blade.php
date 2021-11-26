@extends('layouts.master')

@section('content')
    
<div class="container mt-3">

  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido paterno</th>
      <th scope="col">Apellido materno</th>
      <th scope="col">Usuario</th>
      <th scope="col">fecha de creacion</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <h5>Informacion del docente</h5>
      <th scope="row">{{ $docentes->id }}</th>
      <td>{{ $docentes->nombre }}</td>
      <td>{{ $docentes->apellido_p }}</td>
      <td>{{ $docentes->apellido_m }}</td>
      <td>{{ $docentes->usuario }}</td>
      <td>{{ $docentes->created_at }}</td>
    </tr>
  </tbody>
</table>

</div>
@endsection