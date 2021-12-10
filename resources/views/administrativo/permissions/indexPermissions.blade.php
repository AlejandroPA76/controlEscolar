@extends('layouts.dashboard')

@section('content')

    <div class="container">
    </div>
    <div class="container-fluid mt-3">
        <div class="row" style="height:100vh">
          <div class="col">
            <div class="card">
              
            <div class="card-body"> 
              <div class="ml-3">
                <h4>Permisos de usuarios</h4>
              </div>
                <div class="ml-2">
                  <a class="btn btn-success btn-md ml-4 " href="{{ route('permissions.create')}}">Crear</a>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    {{-- encabezado --}}
                    <thead class="text primary">
                      <th>Id</th>
                      <th>Nombre</th>
                      <th>Guard</th>
                      <th>Fecha de creacion</th>
                    </thead>
                    {{-- cuerpo --}}
                    <tbody>
                      @forelse ($permissions as $permission)
                      <tr>
                        <td>{{$permission->id}}</td>
                        <td>{{$permission->name}}</td>
                        <td>{{$permission->guard_name}}</td>
                        <td>{{$permission->created_at}}</td>
                        <td>
                            <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-info">
                              <i class="material-icons">Ver</i>
                            </a>
                            <a  href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-warning">
                              <i class="material-icons">Editar</i>
                            </a>
                            <form method="POST" class="d-inLine" action="{{ route('permissions.destroy', $permission->id) }}">
                                @csrf
                               @method('DELETE')
                               <button type="submit" class="btn btn-danger">
                                 <i class="material-icons">Borrar</i>
                               </button>
                             </form>
                        </td>
                      </tr>
                      @empty
                       Sin registrar permisos   
                      @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card-footer mr-auto">
                {{$permissions->links()}}
            </div>
            </div>
          </div>
        </div>
      </div>

@endsection