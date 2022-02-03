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
                            <a href="{{ route('docente.grupo_asignados_estudiantes_enviar',$estudiante->id) }}"
                                class="btn btn-info">
                                <i class="material-icons">Enviar Observacion</i>
                            </a>
                            @endif
                            <a href="{{ route('docente.grupo_asignados_observacion_estudiante',$estudiante->id) }}"
                                class="btn btn-info">
                                <i class="material-icons">Mostra Observaciones</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection