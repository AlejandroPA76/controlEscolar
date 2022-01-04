@extends('layouts.dashboard')

@section('content')

<div class="container-fluid mt-2">
  <div class="row justify-content-center align-items-center" style="">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h4>Editar docentes</h4>
          <form method="POST" action ="{{ route('ciclos.update', ['ciclo'=> $ciclo->id]) }}">
            @csrf
            @method('PUT')
            <div class="form-row">
              <label>Nombre del ciclo escolar:</label>
              <input class="form-control" type="text" name="ciclo" required value="{{$ciclo->ciclo}}">
            </div>
            <br>
            
            <div class="form-row">
              <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
            {{-- estudianate --}}
          </form> 
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
