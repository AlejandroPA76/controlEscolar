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
      <th scope="col">matricula</th>
      <th scope="col">fecha de creacion</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <h5>Informacion del estudiante</h5>
      <th scope="row">{{ $estudiante->id }}</th>
      <td>{{ $estudiante->nombre }}</td>
      <td>{{ $estudiante->apellido_p }}</td>
      <td>{{ $estudiante->apellido_m }}</td>
      <td>{{ $estudiante->matricula }}</td>
      <td>{{ $estudiante->created_at }}</td>
    </tr>
  </tbody>
</table>

</div>
@endsection