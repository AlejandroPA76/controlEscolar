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
                                        <th scope="col">foto</th>
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
                                        <td>
                                             <div  align="center">
                                                                  <img src="{{ asset('storage').'/'.$estudiante->foto}}" alt="" width="100">
                                                                </div>
                                                                <div class="col text-center">
                                            <button type="button" class="btn btn-primary btn-sm text-center" data-toggle="modal"
                                                    data-target="#exampleModal-{{ $estudiante->id }}">
                                                    Ver foto </button>
                                                </div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal-{{ $estudiante->id }}" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel"> Foto del estudiante: {{$estudiante->nombre}} {{ $estudiante->apellido_p }} {{ $estudiante->apellido_m}}</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div  align="center">
                                                                  <img src="{{ asset('storage').'/'.$estudiante->foto}}" alt="" width="450">
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

</td>
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
