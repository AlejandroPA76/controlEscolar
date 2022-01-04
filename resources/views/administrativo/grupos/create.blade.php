@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
  <div class="row justify-content-center align-items-center" style="height:100vh">
      <div class="col">
          <div class="card">
              <div class="card-body">
                <h1>Crear Grupo</h1>
                  <form action="{{route ('grupos.store')}}" method="POST" autocomplete="off">
                    @csrf
                    
                    <div class="form-group">

                      <label>Nivel academico</label>
                      <select class="form-control" name="nivel" value="" required>
                        <option value="" selected>Seleccionar</option>
                        @foreach($nvls as $nvl)
                         <option >{{$nvl->id}}-{{$nvl->nivel}}</option>
                        @endforeach

                      </select>
                    </div>
                      <div>
                    <div class="form-group">
                      <label>Grado</label>
                      <select class="form-control" name="grado" value="" required>
                        <option value="" selected>Seleccionar</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Seleccionar grupo</label>
                      <select class="form-control" name="grupo" value="" required>
                        <option value="" selected>Seleccionar</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                      </select>
                    </div>
                    
                    <div class="form-row">
                      <label>Cupo máximo</label>
                      <input class="form-control" type="number" min="0" max="30" name="cupo" value="" required>
                  </div>

                  <div class="form-group">
                                <label >Seleciona al docente:</label>
                                <select class="form-control" name="docente">
                                   <option value="" selected>Seleccionar</option>
                                  @foreach($docenteslist as $docente)
                                  <option> {{$docente->id}}-{{$docente->nombre}}</option>
                                  @endforeach
                                </select>
                  </div>


                      <div>

                        <button type="submit" id="sendlogin" class="btn btn-primary float-right">Crear grupo</button>
                  
                      </div>
      
                      
                     
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
