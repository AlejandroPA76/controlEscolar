@extends('layouts.dashboard')

@section('content')
    

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container-fluid mt-3">
  <div class="row" style="height:100vh">
    <div class="col">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Roles de usuarios</h4>
          <p class="card-category">Roles de usuarios registrados</p>
          <div class=" text-left">
            <a href="{{ route('roles.create') }}" class="btn btn-success">Crear rol de usuario</a>
          </div>
        </div>
      <div class="card-body"> 
        @if (session('success'))
        <div class="alert alert-primary" role="success">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
              {{ session('success') }}
        </div>
        @endif
          
          {{-- incio de la tabla --}}
          <div class="table-responsive mt-2">
            <table class="table">
              
            <thead class="text primary">
                  <th> ID </th>
                  <th> Nombre </th>
                  <th> Guard </th>
                  <th> Fecha de creación </th>
                  <th> Permisos </th>
                  <th class="text-right"> Acciones </th>
              </thead>

              <tbody>
                @forelse ($roles as $role)
                  <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->guard_name }}</td>
                    <td class="text-primary">{{ $role->created_at->toFormattedDateString() }}</td>
                    
                    <td>
                      @forelse ($role->permissions as $permission)
                          <span class="badge badge-info">{{ $permission->name }}</span>
                      @empty
                          <span class="badge badge-danger">No se han agregado permisos</span>
                      @endforelse
                    </td>

                    <td>
                      <a href="{{ route('roles.show', $role->id) }}" class="btn btn-info"> Ver</a>
                      <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-success">Editar </a>
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#model-delete-{{$role->id}}">
                        Eliminar
                        </button>
                    </td>
                  </tr>
                  @include('administrativo.roles.delete')

                  @empty
                  <tr>
                    <td colspan="2">Sin registros.</td>
                  </tr>
                  @endforelse
                </tbody>
              </tbody>
            </table>
          </div> 
          {{-- fin de la tabla --}}
        </div>
        <div class="card-body mr-auto">
          {{ $roles->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection