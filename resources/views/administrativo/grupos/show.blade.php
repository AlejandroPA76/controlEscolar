@extends('layouts.dashboard')

@section('content')

    <div class="container-fluid mt-2">
        <div class="row justify-content-center align-items-center" style="">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4>Datos  del grupo</h4>

                            <div class="form-group">
                                <label >Nivel</label>
                                <input type="text" class="form-control" name="nivel" value="{{ $grupocon->nivel }}"
                                    readonly>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>grado</label>
                                    <input type="text" class="form-control" name="grado"
                                        value="{{$grupocon->grado}}" readonly>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>grupo</label>
                                    <input type="text" class="form-control" name="grupo"
                                        value="{{$grupocon->grupo_nombre}}" readonly>
                                </div>

                                  <div class="form-group col-md-4">
                                    <label>cupo maximo</label>
                                    <input type="text" class="form-control" name="grupo"
                                        value="{{$grupocon->cupo_maximo}}" readonly>
                                </div>
                            </div>
                            <h5>Datos  del docente</h5>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >nombre</label>
                                    <input type="text" class="form-control" name="nombre"
                                        value="{{$grupocon->nombre}}" readonly>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >apellido paterno</label>
                                    <input type="text" class="form-control" name="apellido_p"
                                        value="{{$grupocon->apellido_p}}" readonly>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >apellido materno</label>
                                    <input type="text" class="form-control" name="apellido_p"
                                        value="{{$grupocon->apellido_m}}" readonly>
                                </div>
                            </div>
                            <br>

                            <div class="table-responsive mt-2">
                                <table class="table">
                                    {{-- encabezado --}}
                                    <thead class="text primary">
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Apellido paterno</th>
                                        <th>Apellido materno</th>
                                        <th>Matricula</th>
                                        <th>Creado</th>
                                        <th class="text-right">Acciones</th>
                                    </thead>
                                    {{-- cuerpo --}}
                                    <tbody>
                                        @foreach ($estudiantes as $estudiante)
                                            <tr>
                                                <td>{{ $estudiante->id }}</td>
                                                <td>{{ $estudiante->nombre }}</td>
                                                <td>{{ $estudiante->apellido_p }}</td>
                                                <td>{{ $estudiante->apellido_m }}</td>
                                                <td>{{ $estudiante->matricula }}</td>
                                                <td>{{ $estudiante->created_at }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="form-row">
                                <a href="{{route('grupos.edit', $grupocon->id)}}" class="btn btn-primary mr-3">Actualizar</a>
                                <a href="{{route('grupos.index')}}" class="btn btn btn-success btn-right">Volver</a>

                            </div>
                            {{-- estudianate --}}
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
