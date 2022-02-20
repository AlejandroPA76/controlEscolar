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

                                    <h4 class="card-title">Usuarios</h4>
                                    <p class="card-category">Usuarios registrados</p>
                                    <div class="text">
                                        <a href="{{ route('users.create') }}" class="btn btn-success">Añadir usuario</a>
                                    </div>
                                </div>

                                <div class="card-body">
                                    @if (session('success'))
                                        <div class="alert alert-primary" role="success">
                                            <button type="button" class="close"
                                                data-dismiss="alert">&times;</button>
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <button type="button" class="close"
                                                data-dismiss="alert">&times;</button>
                                            <strong> {{ $errors->first() }} </strong>
                                        </div>
                                    @endif

                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                                <th>ID</th>
                                                <th>Usuarios</th>
                                                <th>Rol del usuario</th>
                                                <th class="text-right">Acciones</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $user)
                                                    @if ($user != 'super@admin.com	')
                                                        <tr>
                                                            <td>{{ $user->id }}</td>
                                                            {{-- <td>{{ $user->name }}</td> --}}
                                                            <td>{{ $user->email }}</td>
                                                            <td>
                                                                @forelse ($user->roles as $role)
                                                                    <span
                                                                        class="badge badge-info">{{ $role->name }}</span>
                                                                @empty
                                                                    <span class="badge badge-danger">Sin rol de
                                                                        usuario</span>
                                                                @endforelse
                                                            </td>
                                                            <td class="td-actions text-right">

                                                                <a href="{{ route('users.show', $user->id) }}"
                                                                    class="btn btn-info"><i
                                                                        class="material-icons">Ver</i></a>
                                                                <a href="{{ route('users.edit', $user->id) }}"
                                                                    class="btn btn-warning"><i
                                                                        class="material-icons">Editar</i></a>
                                                                <button type="button" class="btn btn-danger"
                                                                    data-toggle="modal"
                                                                    data-target="#model-delete-{{ $user->id }}">
                                                                    Eliminar
                                                                </button>
                                                            </td>
                                                            @include('users.delete')
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-body mr-auto">
                                    {{ $users->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
