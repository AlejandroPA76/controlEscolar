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
      <h5>Informacion del tutor</h5>
      <th scope="row">{{ $tutor->id }}</th>
      <td>{{ $tutor->nombre }}</td>
      <td>{{ $tutor->apellido_p }}</td>
      <td>{{ $tutor->apellido_m }}</td>
      <td>{{ $tutor->usuario }}</td>
      <td>{{ $tutor->created_at }}</td>
    </tr>
  </tbody>
</table>

</div>
@endsection