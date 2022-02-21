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
                        <h4 class="card-title">Estudiantes</h4>
                        <p class="card-category">Estudiantes registrados</p>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-primary" role="success">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="table-responsive mt-2">
                            <table class="table">
                                {{-- encabezado --}}
                                <thead class="text primary">
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Apellido paterno</th>
                                    <th>Apellido materno</th>
                                    <th>Matricula</th>
                                    <th>Creado</th>
                                    <th>Acciones</th>
                                </thead>
                                {{-- cuerpo --}}
                                <tbody>
                                    @foreach ($estudiantes as $estudiante)
                                        <tr>
                                            <td>{{ $estudiante->id }}</td>
                                            <td>{{ $estudiante->nombre }}</td>
                                            <td>{{ $estudiante->apellido_p }}</td>
                                            <td>{{ $estudiante->apellido_m }}</td>
                                            <td>{{ $estudiante->matricula }}</td>
                                            <td>{{ $estudiante->created_at }}</td>
                                            <td>
                                                <div class="form-group">
                                                    <a href="{{ route('admin.showEstudiantes', $estudiante->id) }}"
                                                        class="btn btn-info btn-sm">
                                                        <i class="material-icons">Ver</i>
                                                    </a>
                                                
                                                <!-- Button trigger modal -->
                                                @can('subir_index')
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                    data-target="#exampleModal-{{ $estudiante->id }}">
                                                    Subir foto </button>
                                                    @endcan
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal-{{ $estudiante->id }}" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel"> Agregar
                                                                    foto al estudiante</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div>
                                                                    <form action="{{ route('admin.updateEstudiantes',$estudiante->id) }}" method="POST"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="form-group">
                                                                            <input type="file" name="foto" accept="image/*">
                                                                            <br>
                                                                            <div class="danger">
                                                                                <label class="text-sm"></label>
                                                                            </div>
                                                                            {{-- <img src="{{ asset('storage').'/'.$estudiante->foto}}" alt="" width="100" height="100"> --}}
                                                                            @error('foto')
                                                                                <small
                                                                                    class="text-danger">{{ $message }}</small>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">Cancelar</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Guardar
                                                                                imagen</button>
                                                                        </div>

                                                                    </form>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

</div>
                                                {{-- @can('estudiante_destroy')
                                                    <form method="POST" class="d-inLine"
                                                        action="{{ route('admin.destroyEstudiantes', $estudiante->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="material-icons">Borrar</i>
                                                        </button>
                                                    </form>
                                                @endcan --}}
                                                @can('estudiante_edit')
                                                    <a class="btn btn-warning"
                                                        href="{{ route('admin.editEstudiantes', $estudiante->id) }}">
                                                        <i class="material-icons">Editar</i>
                                                    </a>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-body">
                        {{ $estudiantes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
