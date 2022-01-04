@extends('layouts.dashboard')

@section('content')


    <div class="container-fluid mt-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">fecha de creacion</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <h5>Informacion del permiso {{ $permission->name }}</h5>
                    <th scope="row">{{ $permission->id }}</th>
                    <td>{{ $permission->guard_name }}</td>
                    <td>{{ $permission->created_at }}</td>
                </tr>
            </tbody>
        </table>

    </div>
@endsection
