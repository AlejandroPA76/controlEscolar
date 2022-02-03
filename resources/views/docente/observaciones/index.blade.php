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
                                        <div class="alert alert-success" role="success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    <div class="table-responsive mt-2">
                                        <table class="table">
                                            <thead class="text primary">
                                                <th>Id</th>
                                                <th>Grado</th>
                                                <th>Grupo</th>
                                                <th>Accion</th>

                                            </thead>
                                            <tbody>
                                                <tr>

                                                    @foreach ($grupos as $grup)
                                                        <td>{{ $grup->id }}</td>
                                                        <td>{{ $grup->grado }}</td>
                                                        <td>{{ $grup->grupo_nombre }}</td>
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
                                <div class="card-body mr-auto">
                                    {{-- {{ $users->links() }} --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
