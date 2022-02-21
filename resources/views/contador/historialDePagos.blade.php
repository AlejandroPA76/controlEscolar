@extends('layouts.dashboard')
@section('content')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <!-- no additional media querie or css is required -->
    <style type="text/css">
        label {
            display: block;
            font: 1rem 'Fira Sans', sans-serif;
        }

        input,
        label {
            margin: .4rem 0;
        }

    </style>
    <div class="container-fluid mt-3">
        <div class="row justify-content-center align-items-center">
            <div class="col">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Historial de pagos</h4>
                        <p class="card-category">Pagos registrados</p>
                        <div class="text-left">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"
                            data-whatever="@fat">Agregar registro de pago</button>                        </div>
                    </div>
                {{-- <div class="card"> --}}
                    <div class="card-body">
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Registrar un pago manualmente</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('pagos.store') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Nombre del tutor:</label>
                                                <input type="text" class="form-control" id="recipient-name"
                                                    name="nombre_tutor" required>
                                                @if ($errors->has('nombre'))
                                                    <span class="error text-danger"
                                                        for="input-nombre">{{ $errors->first('nombre') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Apellido paterno del
                                                    tutor:</label>
                                                <input type="text" class="form-control" id="recipient-name"
                                                    name="apellido_p_tutor" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Apellido materno del
                                                    tutor:</label>
                                                <input type="text" class="form-control" id="recipient-name"
                                                    name="apellido_m_tutor" required>
                                            </div>

                                            <input type="hidden" name="num_operacion" value="Ninguno(Pago en efectivo)">
                                            {{-- <div class="form-group">
                                                <label>Seleciona al tutor:</label>
                                                <select class="form-control" name="nombre_tutor" required>
                                                    <option value="" selected>Seleccionar</option>
                                                    @foreach ($tutores as $tutor)
                                                        <option value="{{ $tutor->id }}"> 
                                                            {{ $tutor->apellido_p }} {{ $tutor->apellido_m }}</option>
                                                        <option value="{{ $tutor->id }}"> 
                                                            {{ $tutor->apellido_p }} {{ $tutor->apellido_m }}</option>
                                                    @endforeach
                                                </select>
                                            </div> --}}

                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Email del tutor:</label>
                                                <input type="text" class="form-control" id="recipient-name" name="email"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Cantidad pagada:</label>
                                                <input type="number" class="form-control" id="recipient-name"
                                                    name="cantidad_pagada" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" id="recipient-name" required
                                                    name="status" value="pagado">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Motivo del pago:</label>
                                                <input type="text" class="form-control" id="recipient-name" name="motivo"
                                                    required>
                                            </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <form action="{{ route('historialPagos') }}" method="get" autocomplete="off">

                                <div class="container">
                                    <div class="row align-items-center">
                                        <div class="col">
    
                                            <label>Buscar por mes</label>
                                            <input type="month" name="fecha" min="2021-01">
                                            <button type="submit" class="btn btn-dark">Buscar</button>
                                            
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <br>

                        <div>
                            @if (session('success'))
                            <div class="alert alert-primary" role="success">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ session('success') }}
                            </div>
                        @endif
                        </div>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">Status del pago</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Accion</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($historialPagos as $hpagos)
                                    <tr>

                                        <td>{{ $hpagos->id }}</td>
                                        <td>{{ $hpagos->nombre_tutor }}</td>
                                        <td>{{ $hpagos->apellido_p_tutor }} {{ $hpagos->apellido_m_tutor }}</td>
                                        <td>{{ $hpagos->status }}</td>
                                        <td>{{ $hpagos->cantidad_pagada }}</td>
                                        <td>{{ $hpagos->created_at }}</td>
                                        <td><a href="{{ route('verPago', $hpagos->id) }}">Detalle del pago</a></td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
