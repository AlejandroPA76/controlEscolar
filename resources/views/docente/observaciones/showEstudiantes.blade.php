@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid mt-3">
        <div class="row" style="height:100vh">
            <div class="col">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Mis estudiantes</h4>
                        <p class="card-category">Estudiantes registrados</p>
                    </div>
                    
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-primary" role="success">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ session('success') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong> {{ $errors->first() }} </strong>
                            </div>
                        @endif
                        <div class="table-responsive mt-2">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellido paterno</th>
                                        <th scope="col">Apellido materno</th>
                                        <th scope="col">matricula</th>
                                        <th scope="col">Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($estudiantes as $estudiante)
                                        <tr>
                                            <td>{{ $estudiante->id }}</td>
                                            <td>{{ $estudiante->nombre }}</td>
                                            <td>{{ $estudiante->apellido_p }}</td>
                                            <td>{{ $estudiante->apellido_m }}</td>
                                            <td>{{ $estudiante->matricula }}</td>
                                            <td>
                                                @if (auth()->user()->hasRole('Docente'))
                                                    <div>
                                                        <a href="{{ route('docente.grupo_asignados_estudiantes_enviar', $estudiante->id) }}"
                                                            class="btn btn-info">
                                                            <i class="material-icons">Enviar Observacion</i>
                                                        </a>
                                                    </div>
                                                @endif
                                                <br>
                                                <div>
                                                    <a href="{{ route('docente.grupo_asignados_observacion_estudiante', $estudiante->id) }}"
                                                        class="btn btn-info">
                                                        <i class="material-icons">Mostra Observaciones</i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{--  --}}
                        </div>
                        <div>
                            <a href="{{ route('docente.grupo_asignados') }}" class="btn btn-primary">Regresar</i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
