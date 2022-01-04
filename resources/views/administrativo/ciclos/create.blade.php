@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
  <div class="row justify-content-center align-items-center" style="height:50vh">
      <div class="col">
          <div class="card">
              <div class="card-body">
                <h1>Ciclo escolar</h1>
                  <form action="{{route ('ciclos.store')}}" method="POST" autocomplete="off">
                    @csrf
                    <div class="form-row">
                      <label>Nombre del ciclo escolar:</label>
                      <input class="form-control" type="text" name="ciclo" required>
                  </div>
            <div>
              <br>
              <button class="btn btn-primary" type="submit" style="float: right;">Crear ciclo escolar</button>
            </div>
                      
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
