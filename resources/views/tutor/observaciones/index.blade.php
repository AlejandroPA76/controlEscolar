@extends('layouts.dashboard')

@section('content')

    <div class="container-fluid mt-3">
        <div class="row" style="height:100vh">
            <div class="col">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Observaciones realizadas por el docente</h4>
                    </div>

                    <div class="card-body">

                        <div class="container-fluid mt-3">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellido paterno</th>
                                        <th scope="col">Apellido materno</th>
                                        <th scope="col">Observacion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($estudiantes as $estudiante)
                                        <tr>
                                            <td>{{ $estudiante->nombre }}</td>
                                            <td>{{ $estudiante->apellido_p }}</td>
                                            <td>{{ $estudiante->apellido_m }}</td>
                                            <td>{{ $estudiante->observacion }}</td>
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
