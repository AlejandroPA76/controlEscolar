@extends('layouts.dashboard')

@section('content')

    <div class="container-fluid mt-2">
        <div class="row justify-content-center align-items-center" style="">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4>Datos  del grupo</h4>
                         <form action="{{route('grupos.update',$grupoedit->id)}}" method="POST" autocomplete="off">
                            @csrf
                            @method('PUT')
                            
                            <div class="form-group">
                               <label>Nivel academico</label>
                                <select class="form-control" name="nivel" value="" required>
                            <option value="{{$grupoedit->nivel}}" selected="select">{{$grupoedit->nivel}}</option>
                                      @foreach($niveles as $nvl)
                                        <option value="{{$nvl->id}}">{{$nvl->nivel}}</option>
                                        @endforeach
                                          </select>
                            </div>
                            <div class="form-row">
                                     <div class="form-group col-md-4">

                                <label>Grado</label>
                                <select class="form-control" name="nivel" value="" required>
                                    <option value="{{$grupoedit->grado}}" selected="select">{{$grupoedit->grado}}</option>
                                    @foreach($grupos as $grup)
                                        <option value="{{$grup->id}}">{{$grup->grado}}</option>
                                        @endforeach
                                </select>
                           
                                </div>

                                  <div class="form-group col-md-4">

                                <label>Grupo</label>
                                <select class="form-control" name="nivel" value="" required>
                                    <option value="" selected="select">{{$grupoedit->grupo_nombre}}</option>
                                        @foreach($grupos as $grp)
                                        <option value="{{$grp->id}}">{{$grp->grupo_nombre}}</option>
                                        @endforeach

                                </select>
                           
                                </div>
                                    <div class="form-group col-md-4">
                                    <label>Cupo máximo</label>
                                    <input class="form-control" type="number" min="0" max="30" name="cupo" value="{{$grupoedit->cupo_maximo}}"
                                        required>
                                </div>

                            </div>
                            
                             
                            <h5>Datos  del docente</h5>
                            <div class="form-group">

                                <label>Docente</label>
                                <select class="form-control" name="nivel" value="" required>
                                    <option value="" selected="select">{{$grupoedit->nombre}} {{$grupoedit->apellido_p}} {{$grupoedit->apellido_m}}</option>
                                        @foreach($docentes as $dct)
                                        <option value="{{$dct->id}}">{{$dct->nombre}} {{$dct->apellido_p}} {{$dct->apellido_m}}</option>
                                        @endforeach

                                </select>
                           
                                
                            </div>
                            <br>
                            <div class="form-row">
                               <button type="submit" class="btn btn-primary mr-3">Actualizar</button> 
                           
                                <a href="{{route('grupos.index')}}" class="btn btn btn-success btn-right"> Cancelar
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
