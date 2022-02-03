@extends('layouts.dashboard')

@section('content')


<div class="content mt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Nueva Observacion</h5>
                                </div>
                                <div class="modal-body">
                                  <form method="POST" action="{{route('docente.grupo_asignados_estudiantes_send')}}">
                                    @csrf
                                    <div class="form-group">
                                      <label for="recipient-name" class="col-form-label">Estudiante: {{$estudiante->matricula}}</label>
                                      <input type="text" class="form-control" id="recipient-name" value="{{ $estudiante->nombre }} {{ $estudiante->apellido_p }} {{ $estudiante->apellido_m}}" readonly>
                                    </div>
                                    <div class="form-group">
                                    @foreach ($docente as $d)
                                      <label for="message-text" class="col-form-label">Mensaje</label>
                                      <textarea class="form-control" name="mensaje"></textarea>
                                      <input type="hidden" name="docente_id" value="{{$d->id}}">
                                    @endforeach
                                    </div>

                                    <input type="hidden" name="estudiante_id" value="{{$estudiante->id}}">

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                      </div>
                                  </form>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection