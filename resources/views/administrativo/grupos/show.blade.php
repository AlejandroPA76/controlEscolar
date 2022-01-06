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
                         <h2>Vista detallada del grupo {{ $grupocon->grado}}{{$grupocon->grupo_nombre}} de {{$grupocon->nivel}}:</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-action">Identificador: {{$grupocon->id}}</li>
                            <li class="list-group-item list-group-item-action">Grado: {{$grupocon->grado}}</li>
                            <li class="list-group-item list-group-item-action">Grupo: {{$grupocon->grupo_nombre}}</li>
                            <li class="list-group-item list-group-item-action">Nivel: {{$grupocon->nivel}}</li>
                            <li class="list-group-item list-group-item-action">Nombre del docente: {{$grupocon->nombre}}</li>
                        </ul>
                        <div class="card-body">
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection