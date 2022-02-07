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

                                    <h4 class="card-title">Historial de tus pagos</h4>
                                    <p class="card-category">Lista de los pagos realizados</p>

                                </div>

                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text">
                                                <th>Id</th>
                                                <th>Nombre completo</th>
                                                <th>Email</th>
                                                <th>Número de operacion</th>
                                                <th>Motivo</th>
                                                <th>Cantidad pagada</th>
                                                <th>Fecha</th>

                                            </thead>
                                            <tbody>
                                                @foreach ($historial as $h)
                                                    <tr>
                                                        <td>{{ $h->id }}</td>
                                                        <td>{{ $h->nombre_tutor }} {{ $h->apellido_p_tutor }}
                                                            {{ $h->apellido_m_tutor }}</td>
                                                        <td>{{ $h->email }}</td>
                                                        <td>{{ $h->num_operacion }}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary"
                                                                data-toggle="modal" data-target="#exampleModal">
                                                                Ver motivo
                                                            </button>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                                role="dialog" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">Motivo del pago</h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <h5>{{ $h->motivo }}</h5>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>



                                                        </td>
                                                        <td>{{ $h->cantidad_pagada }}</td>
                                                        <td>{{ $h->created_at }}</td>

                                                    </tr>

                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-body mr-auto">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
