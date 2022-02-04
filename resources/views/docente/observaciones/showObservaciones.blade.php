@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid mt-3">
        <div class="row" style="height:100vh">
            <div class="col">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Observaciones hechos al alumno</h4>
                    </div>

                    <div class="card-body">
                        <div class="container-fluid mt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre Docente</th>
                                        <th scope="col">Observacion</th>
                                        <th scope="col">Matricula</th>
                                        <th scope="col">created_at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($observaciones as $observacion)
                                        <tr>
                                            <td>{{ $observacion->nombre }}</td>
                                            <td>{{ $observacion->observacion }}</td>
                                            <td>{{ $observacion->matricula }}</td>
                                            <td>{{ $observacion->created_at }}</td>
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
