@extends('layouts.dashboard')

@section('content')

    <div class="container-fluid mt-2">
        <div class="row justify-content-center align-items-center" style="">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4>Datos del grupo</h4>
                        <form action="{{ route('grupos.update', ['grupo' => $grupo->id]) }}" method="POST" autocomplete="off">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Nivel</label>
                                <input type="text" class="form-control" name="nivel" value="{{ $grupoedit->nivel }}"
                                    readonly>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>grado</label>
                                    <input type="text" class="form-control" name="grado" value="{{ $grupoedit->grado }}"
                                        readonly>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>grupo</label>
                                    <input type="text" class="form-control" name="grupo"
                                        value="{{ $grupoedit->grupo_nombre }}" readonly>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Cupo máximo</label>
                                    <input class="form-control" type="number" min="0" max="30" name="cupo"
                                        value="{{ $grupo->cupo_maximo }}" required>
                                </div>
                            </div>

                            <h5>Datos del docente</h5>
                            <div class="form-group">

                                <label>Docente</label>
                                <select class="form-control" name="docente" value="">
                                    <option value="" selected="select">{{ $grupoedit->nombre }} {{ $grupoedit->apellido_p }}
                                        {{ $grupoedit->apellido_m }}</option>
                                    @foreach ($docentes as $dct)
                                        <option value="{{ $dct->id }}">{{ $dct->nombre }} {{ $dct->apellido_p }}
                                            {{ $dct->apellido_m }}</option>
                                    @endforeach --}}

                                </select>


                            </div>
                            <br>
                            <div class="form-row">
                                <button type="submit" class="btn btn-primary mr-3">Actualizar</button>

                                <a href="{{ route('grupos.index') }}" class="btn btn btn-success btn-right"> Cancelar
                                    edicion </a>

                            </div>
                            {{-- estudianate --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
