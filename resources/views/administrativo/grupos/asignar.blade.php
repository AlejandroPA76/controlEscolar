@extends('layouts.dashboard')

@section('content')

    <div class="container-fluid mt-2">
        <div class="row justify-content-center align-items-center" style="">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4>Datos del grupo donde serán asignados los alumnos</h4>
                        <form action="{{ route('grupos.update', $grupoedit->id) }}" method="POST" autocomplete="off">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Nivel</label>
                                <input type="text" class="form-control" name="nivel" value="{{ $grupoedit->nivel }}"
                                    readonly>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>grado</label>
                                    <input type="text" class="form-control" name="grado" value="{{ $grupoedit->grado }}"
                                        readonly>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>grupo</label>
                                    <input type="text" class="form-control" name="grupo"
                                        value="{{ $grupoedit->grupo_nombre }}" readonly>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Cupo máximo</label>
                                    <input class="form-control" type="number" min="0" max="30" name="cupo"
                                        value="{{ $grupoedit->cupo_maximo }}" required>
                                </div>
                            </div>

                            <br>
                            <h5>Docente que impartirá en este grupo</h5>
                            <div class="form-group">

                                <label>Docente</label>
                                <select class="form-control" name="docente" value="">
                                    <option value="" selected="select">{{ $grupoedit->nombre }}
                                        {{ $grupoedit->apellido_p }}
                                        {{ $grupoedit->apellido_m }}</option>
                                    @foreach ($docentes as $dct)
                                        <option value="{{ $dct->id }}">{{ $dct->nombre }} {{ $dct->apellido_p }}
                                            {{ $dct->apellido_m }}</option>
                                    @endforeach --}}

                                </select>


                            </div>
                            <div class="">
                                <h4>Elige en la lista los estudiantes a asignar al grupo actual</h4>
                            </div>
                            <br>

                            <div class="table-responsive mt-2">
                                <table class="table">
                                    <thead class="text primary">
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Apellido paterno</th>
                                        <th>Apellido materno</th>
                                        <th>Matricula</th>
                                        <th>Acciones</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($estudiantes as $estudiante)
                                            <tr>
                                                <td>{{ $estudiante->id }}</td>
                                                <td>{{ $estudiante->nombre }}</td>
                                                <td>{{ $estudiante->apellido_p_a }}</td>
                                                <td>{{ $estudiante->apellido_m_a }}</td>
                                                <td>{{ $estudiante->matricula }}</td>
                                                <td>
                                                    <a href="#" class="btn btn-info">
                                                        <i class="material-icons">Asignar</i>
                                                    </a>
                                                    {{-- <a href="{{ route('asignar.', $estudiante->id) }}" class="btn btn-info">
                                        <i class="material-icons">Asignar</i>
                                    </a> --}}
                                                    <br>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
