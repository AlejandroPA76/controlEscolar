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
                                    <h4 class="card-title">Grupos</h4>
                                    <div class="text-left">
                                        <a href="{{ route('grupos.create') }}" class="btn btn-success">Crear grupo</a>
                                    </div>
                                    <br>


                                    <p class="card-category"> Listado de grupos</p>

                                </div>
                                <div class="card-body">
                                    @if (session('success'))
                                        <div class="alert alert-success" role="success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    <div class="table-responsive mt-2">
                                        <table class="table">
                                            <thead class="text primary">
                                                <th>Id</th>
                                                <th>Grado</th>
                                                <th>Grupo</th>
                                                <th>Nivel</th>
                                                <th>Docente</th>
                                                <th>Accion</th>
                                                
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    
                                                @foreach($grupos as $grup)
                                                <td>{{ $grup->id }}</td>
                                                <td>{{ $grup->grado}}</td>
                                                <td>{{ $grup->grupo_nombre}}</td>
                                                <td>{{$grup->nivel}}</td>
                                                <td>{{$grup->nombre}} {{$grup->apellido_p}} {{$grup->apellido_m}}</td>
                                                <td>
                                                    <a href="{{route('grupos.show',$grup->id)}}" class="btn btn-info" >
                                                         <i class="material-icons">Ver</i>
                                                    </a>
                                                     <a href="{{route('grupos.edit',$grup->id)}}" class="btn btn-warning">
                                                         <i class="material-icons">Editar</i>
                                                     </a>

                                                    <form action="{{route('grupos.destroy',$grup->id)}}" method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <input type="submit" class="btn btn-danger btn-sm"
                                                                    value="Eliminar"
                                                                    onclick="return confirm('deseas borrar?')">
                                                            </form>
                                                </td>
                                              
                                                </tr>
                                               
                                               @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-body mr-auto">
                                    {{-- {{ $users->links() }} --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
