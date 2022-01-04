@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center" style="height:50vh">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h1>Crear Nivel educativo</h1>
                        <form action="/niveles/{{ $nvl->id }}" method="POST" autocomplete="off">
                            @csrf
                            @method('put')
                            <div class="form-row">
                                <label>Nombre del nivel:</label>
                                <input class="form-control" type="text" name="nivelnameupdate" value="{{ $nvl->nivel }}"
                                    required>
                            </div>
                            <div>
                                <br>
                                <button class="btn btn-primary" type="submit" style="float: right;">Crear nivel!</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
