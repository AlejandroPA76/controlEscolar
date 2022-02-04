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
                                    <h4 class="card-title">Ciclos escolares</h4>
                                    <div class="text-left">
                                        <a href="{{ route('ciclos.create') }}" class="btn btn-success">Crear ciclo
                                            escolar</a>
                                    </div>
                                    <br>


                                    <p class="card-category"> Listado de ciclos escolares</p>

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
                                    {{-- fin --}}

                                    <div class="table-responsive mt-3">
                                        <table class="table">
                                            {{-- encabezado --}}
                                            <thead class="text primary">
                                                <th>Id</th>
                                                <th>Ciclo escolar</th>
                                                <th>Acciones</th>
                                            </thead>
                                            {{-- cuerpo --}}
                                            <tbody>
                                                @foreach ($ciclos as $ciclo)
                                                    <tr>

                                                        <td>{{ $ciclo->id }}</td>
                                                        <td>{{ $ciclo->ciclo }}</td>
                                                        <td>
                                                            <div class="row">
                                                                <div class="form-row">


                                                                    <a href="{{ route('ciclos.edit', $ciclo->id) }}"
                                                                        class="btn btn-warning"><i
                                                                            class="material-icons">Editar</i></a>

                                                                    <form method="POST" class="d-inLine"
                                                                        action="{{ route('ciclos.destroy', ['ciclo' => $ciclo->id]) }}">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-danger ml-2">Borrar</button>
                                                                    </form>
                                                                </div>
                                                            </div>

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
