@extends('layouts.dashboard')

@section('content')

    <div class="container-fluid mt-2">
        <div class="row justify-content-center align-items-center" style="">
            <div class="col">
                <div class="card">
                    <div class="card-body">

                        <h4>Datos del grupo donde serán asignados los alumnos</h4>
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
                        <div class="form-group">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <h5>Docente que impartirá en este grupo</h5>
                                        <div class="form-group">
                                            <input class="form-control" type="text" min="0" max="30" name="cupo"
                                                value="{{ $grupoedit->nombre }} {{ $grupoedit->apellido_p }} {{ $grupoedit->apellido_m }}"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="">
                            <h4>Elige en la lista los estudiantes a asignar al grupo</h4>
                            <div class="d-flex justify-content-between align-items-rigth">
                                <a href="{{ route('grupos.index') }}" class="btn btn btn-warning float-right">
                                    Terminar</a>
                            </div>
                        </div>
                        {{-- <br> --}}

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
                                            <td>{{ $estudiante->apellido_p }}</td>
                                            <td>{{ $estudiante->apellido_m }}</td>
                                            <td>{{ $estudiante->matricula }}</td>

                                            <td>
                                                <form action="{{ route('grupos.asignaralumno') }}" method="POST"
                                                    id="asgralmn">
                                                    @csrf
                                                    <h5>Seleccione Ciclo Escolar</h5>
                                                    <div class="form-group">

                                                        <label>Ciclo</label>
                                                        <select class="form-control" value="" name="clic_id">
                                                            @foreach ($ciclo as $c)
                                                                <option value="{{ $c->id }}" selected="select">
                                                                    {{ $c->ciclo }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>


                                                    <input type="hidden" name="estd_id" id="estd_id"
                                                        value="{{ $estudiante->id }}">
                                                    <input type="hidden" name="grup_id" id="grup_id"
                                                        value="{{ $grupoedit->id }}">
                                                    <button type="submit" id="sendAssing"
                                                        class="btn btn-primary">Asignar</button>
                                                </form>
                                                <br>
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
@endsection
