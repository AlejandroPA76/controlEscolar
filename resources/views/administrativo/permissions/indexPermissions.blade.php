@extends('layouts.dashboard')

@section('content')


    <div class="container-fluid mt-3">
        <div class="row" style="height:100vh">
            <div class="col">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Permisos</h4>
                        <p class="card-category">Permisos registrados</p>
                        <div class="text-left">
                            <a href="{{ route('permissions.create') }}" class="btn btn-success">Crear permiso</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-primary" role="success">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table">
                                {{-- encabezado --}}
                                <thead class="text primary">
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Guard</th>
                                    <th>Fecha de creacion</th>
                                    <th>Acciones</th>
                                </thead>
                                {{-- cuerpo --}}
                                <tbody>
                                    @forelse ($permissions as $permission)
                                        <tr>
                                            <td>{{ $permission->id }}</td>
                                            <td>{{ $permission->name }}</td>
                                            <td>{{ $permission->guard_name }}</td>
                                            <td>{{ $permission->created_at }}</td>
                                            <td>
                                                <a href="{{ route('permissions.show', $permission->id) }}"
                                                    class="btn btn-info">
                                                    <i class="material-icons">Ver</i>
                                                </a>
                                                <a href="{{ route('permissions.edit', $permission->id) }}"
                                                    class="btn btn-warning">
                                                    <i class="material-icons">Editar</i>
                                                </a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#model-delete-{{ $permission->id }}">
                                                    Eliminar
                                                </button>
                                            </td>
                                        </tr>
                                        @include('administrativo.permissions.delete')
                                    @empty
                                        Sin registrar permisos
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-body mr-auto">
                        {{ $permissions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
