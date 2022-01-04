@extends('layouts.dashboard')

@section('content')

    <div class="container-fluid mt-2">
        <div class="row justify-content-center align-items-center" style="">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4>Editar docentes</h4>
                        <form method="POST" action="{{ route('admin.updateDocentes', ['docentes' => $docentes->id]) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" value="{{ $docentes->nombre }}">
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="apellido_p">Primer apellido</label>
                                    <input type="text" class="form-control" name="apellido_p"
                                        value="{{ $docentes->apellido_p }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="apellido_m">Segundo apellido</label>
                                    <input type="text" class="form-control" name="apellido_m"
                                        value="{{ $docentes->apellido_m }}">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="usuario"> Usuario</label>
                                    <input type="text" class="form-control" name="usuario"
                                        value="{{ $docentes->usuario }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="contraseña"> Contraseña</label>
                                    <input type="password" class="form-control" name="contraseña"
                                        value="{{ $docentes->contraseña }}">
                                </div>
                            </div>
                            <br>
                            <div class="form-row">

                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                            {{-- estudianate --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
