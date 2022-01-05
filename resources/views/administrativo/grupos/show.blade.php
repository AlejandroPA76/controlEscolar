@extends('layouts.dashboard')
@section('content')
    <div class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <div class="card-title">Usuarios</div>
            <p class="card-category">Vista detallada del grupo {{$grupoconsultada->id}}</p>
                        </div>
                        <!--body-->
                        <div class="card-body">

                            @if (session('success'))
                                <div class="alert alert-success" role="success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-md-4">

                                </div>
                                <!--end card user-->

                                <div class="col-md-10">
                                    <div class="card card-user">
                                        <div class="card-body">
                                            <p class="card-text">
                                            <div class="author">
                                                <a href="#" class="d-flex">

                                                    <h5 class="title mx-3">{{"#" }}</h5>
                                                </a>
                                                <p class="description">
                                                    {{"#" }} <br>
                                                   
                                                </p>
                                            </div>
                                            </p>
                                            <div class="card-description">

                                            </div>
                                            <div class="card-footer">
                                                <div class="button-container">
                                                    <a href="{{route('grupos.index')}}"
                                                        class="btn btn-sm btn-success mr-3"> Volver </a>
                                                    <button class="btn btn-sm btn-primary">Editar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end card user 2-->



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
