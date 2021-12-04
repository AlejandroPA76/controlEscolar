@extends('layouts.dashboard')
@section('content')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<div class="container-fluid">
    <h1>HOLA Bienvenido</h1>
</div>
<!------ Include the above in your HEAD tag ---------->
{{-- <div class="container">
    <div class="row justify-content-center align-items-center" style="height:100vh">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h1>Menu</h1>
                    <div class="list-group">
                        <a href="{{route('admin.estudiantes')}}" class="list-group-item list-group-item-action">Estudiantes</a>
                        <a href="{{route('admin.tutores')}}" class="list-group-item list-group-item-action">Tutores</a>
                        <a href="{{route('admin.crearGrupo')}}" class="list-group-item list-group-item-action">Grupos</a>
                        <a href="{{route('admin.directoraDocentes')}}" class="list-group-item list-group-item-action disabled">Docentes</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
{{-- </div> --}}

@endsection