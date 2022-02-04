@extends('layouts.dashboard')
@section('content')
    <div class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Grupos</h4>
                                    <br>

                                    <p class="card-category"> Listado de tus grupos</p>
                                </div>
                                <div class="card-body">
                                    @if (session('success'))
                                        <div class="alert alert-primary" role="success">
                                            <button type="button" class="close"
                                                data-dismiss="alert">&times;</button>
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <button type="button" class="close"
                                                data-dismiss="alert">&times;</button>
                                            <strong> {{ $errors->first() }} </strong>
                                        </div>
                                    @endif
                                    <div class="table-responsive mt-2">
                                        <table class="table">
                                            <thead class="text primary">
                                                <th>Id</th>
                                                <th>Grado</th>
                                                <th>Grupo</th>
                                                <th>Nivel Academico</th>
                                                <th>Accion</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    @foreach ($grupos as $grup)
                                                        <td>{{ $grup->id }}</td>
                                                        <td>{{ $grup->grado }}</td>
                                                        <td>{{ $grup->grupo_nombre }}</td>
                                                        <td>{{ $grup->nivel }}</td>
                                                        <td>
                                                            <a href="{{ route('docente.grupo_asignados_estudiantes', $grup->id) }}"
                                                                class="btn btn-info">
                                                                <i class="material-icons">Ver Estudiantes</i>
                                                            </a>
                                                        </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
