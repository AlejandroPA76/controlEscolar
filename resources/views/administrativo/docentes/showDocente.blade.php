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
                        <p class="card-category">Vista detallada del docente {{ $docentes1->nombre }}</p>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <h5 class="card-title"><strong> {{$docentes1->nombre}}</strong> </h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Nombre: {{$docentes1->nombre}}</li>
                            <li class="list-group-item">Apellido paterno: {{$docentes1->apellido_p}}</li>
                            <li class="list-group-item">Apellido materno: {{$docentes1->apellido_m}}</li>
                            <li class="list-group-item">Matricula: {{$docentes1->matricula}}</li>
                            <li class="list-group-item">Usuario: {{$docentes1Union->email}}</li>
                        </ul>
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <a href="{{ route('admin.indexDocentes') }}" class="btn btn btn-success mr-3"> Volver </a>
                            <a href="{{ route('admin.editDocentes', ['docentes' => $docentes->id]) }}"
                                class="btn btn btn-primary mr-3"> Editar </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
