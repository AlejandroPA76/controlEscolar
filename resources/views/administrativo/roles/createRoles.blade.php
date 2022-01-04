@extends('layouts.dashboard')

@section('content')


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <!-- no additional media querie or css is required -->
    <div class="container-fluid mt-3">
        <div class="row justify-content-center align-items-center" style="">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4>crear roles para los usuarios</h4>
                        <form method="POST" action="{{ route('roles.store') }}" class="form-horizontal">
                            @csrf
                            <div class="card ">
                                <!--Header-->
                                <!--End header-->
                                <!--Body-->
                                <div class="card-body">
                                    <div class="row">
                                        <label for="name" class="col-sm-2 col-form-label">Nombre del rol</label>
                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="name" autocomplete="off"
                                                    autofocus required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label for="name" class="col-sm-2 col-form-label">Permisos</label>
                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                <div class="tab-content">
                                                    <div class="tab-pane active">
                                                        <table class="table">

                                                            <tbody>
                                                                @foreach ($permissions as $id => $permission)
                                                                    <tr>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox" name="permissions[]"
                                                                                        value="{{ $id }}">
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            {{ $permission }}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>

                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--End body-->

                                <!--Footer-->
                                <div class="card-footer ml-auto mr-auto">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                                <!--End footer-->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
