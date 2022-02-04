@extends('layouts.dashboard')

@section('content')

    <div class="container-fluid mt-3">
        <div class="row" style="height:100vh">
            <div class="col">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Informacion del estudiante</h4>
                    </div>

                    <div class="card-body">

                        <div class="container-fluid mt-3">
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
                                        {{-- <h5>Informacion del estudiante</h5> --}}
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
