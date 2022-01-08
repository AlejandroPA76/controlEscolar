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
                                <input type="text" class="form-control" name="nombre" value="{{ $docentes->nombre }}"
                                    required>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="apellido_p">Primer apellido</label>
                                    <input type="text" class="form-control" name="apellido_p"
                                        value="{{ $docentes->apellido_p }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="apellido_m">Segundo apellido</label>
                                    <input type="text" class="form-control" name="apellido_m"
                                        value="{{ $docentes->apellido_m }}" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="usuario"> Usuario</label>
                                    <input type="text" class="form-control" name="usuario"
                                        value="{{ $docentes->email }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="contraseña"> Contraseña</label>
                                    <input type="password" class="form-control" name="contraseña"
                                        value="{{ $docentes->password }}" required required>
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                            </div>
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                <a href="{{ route('admin.indexDocentes') }}" class="btn btn btn-warning float-right">
                                    Cancelar edicion</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
