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
                        <h3>Vista detallada del tutor</h3>
                        {{-- <p class="card-category"><strong>{{ $tutor->nombre}} {{ $tutor->apellido_p}} {{ $tutor->apellido_m}}</strong></p> --}}
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-primary" role="success">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title "><strong> {{ $tutor->nombre }} {{ $tutor->apellido_p}}</strong> </h5>
                        </div>
                        <ul class="list-group list-group-flush ">
                            <li class="list-group-item"><strong>Nombre: </strong> {{ $tutor->nombre }} </li>
                            <li class="list-group-item"><strong>Apellido paterno: </strong> {{ $tutor->apellido_p }}</li>
                            <li class="list-group-item"><strong>Apellido materno: </strong> </li>
                            <li class="list-group-item"><strong>Usuario: </strong> {{ $tutor->email }} </li>
                        </ul>
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <a href="{{ route('admin.indexTutores') }}" class="btn btn btn-success mr-3"> Volver al
                                inicio </a>
                            <a href="{{ route('admin.editTutores', ['tutor' => $tutor->id]) }}"
                                class="btn btn btn-primary mr-3"> Editar </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
