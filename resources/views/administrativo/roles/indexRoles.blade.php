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
        
      <div class="card-body"> 
        <div class="">
          <h4>roles</h4>
        </div>

          <div class="ml-2">
            <a class="btn btn-success btn-md " href="{{ route('roles.create')}}">Crear</a>
          </div> 

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

                      <form action="{{ route('roles.destroy', $role->id) }}" method="post"
                        onsubmit="return confirm('¿Estas seguro que deseas borrar?!')" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" rel="tooltip" class="btn btn-danger">Borrar
                        </button>
                      </form>
                    </td>
                  </tr>
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
        <div class="card-footer mr-auto">
          {{ $roles->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection