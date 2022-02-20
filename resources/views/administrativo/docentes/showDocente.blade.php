@extends('layouts.dashboard')
@section('content')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <!-- no additional media querie or css is required -->
    <div class="container-fluid mt-3">
        <div class="row" style="height:100vh">
            <div class="col">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <p class="card-category">Datos  del docente <strong>{{ $docentes->nombre}} {{ $docentes->apellido_p}} {{ $docentes->apellido_m}}</strong></p>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-primary" role="success">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title "><strong> {{ $docentes->nombre }}</strong> </h5>
                        </div>
                        <ul class="list-group list-group-flush ">
                            <li class="list-group-item"><strong>Nombre: </strong> {{ $docentes->nombre }}</li>
                            <li class="list-group-item"><strong>Apellido paterno: </strong> {{ $docentes->apellido_p }}</li>
                            <li class="list-group-item"><strong>Apellido materno: </strong> {{ $docentes->apellido_m }}</li>
                            <li class="list-group-item"><strong>Matricula: </strong> {{ $docentes->matricula }}</li>
                            {{-- <li class="list-group-item"><strong>Usuario: </strong> </li> --}}
                        </ul>
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <a href="{{ route('admin.indexDocentes') }}" class="btn btn btn-success mr-3"> Volver al
                                inicio </a>
                            <a href="{{ route('admin.editDocentes', ['docentes' => $docentes->id]) }}"
                                class="btn btn btn-primary mr-3"> Editar </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
