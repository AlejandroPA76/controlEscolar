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
                        <h3>Pago</h3>
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
                            <h5 class="card-title "><strong> Numero del pago: {{ $pag->id }}</strong> </h5>
                        </div>
                        <ul class="list-group list-group-flush ">
                              <li class="list-group-item"><strong>id del tutor: </strong> {{ $pag->id_tutor}}</li>
                            <li class="list-group-item"><strong>Nombre: </strong> {{ $pag->nombre_tutor }} </li>
                            <li class="list-group-item"><strong>Apellido paterno: </strong> {{ $pag->apellido_p_tutor }}</li>
                            <li class="list-group-item"><strong>Apellido materno: </strong> {{ $pag->apellido_m_tutor}}</li>
                            <li class="list-group-item"><strong>Numero de Operacion MercadoPago: </strong> {{ $pag->num_operacion }} </li>
                            <li class="list-group-item"><strong>Motivo: </strong> {{ $pag->motivo }} </li>
                             <li class="list-group-item"><strong>Status: </strong> {{ $pag->status }} </li>
                              <li class="list-group-item"><strong>Cantidad Pagada: </strong> {{ $pag->cantidad_pagada }} </li>
                               <li class="list-group-item"><strong>Fecha: </strong> {{ $pag->created_at }} </li>
                        </ul>
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <a href="{{route('historialPagos')}}" class="btn btn btn-success mr-3"> Volver al
                                inicio </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
