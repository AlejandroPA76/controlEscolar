@extends('layouts.dashboard')

@section('content')
    

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!-- no additional media querie or css is required -->
<div class="container-fluid mt-3">
  <div class="row justify-content-center align-items-center" style="">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h4>Editar permisos</h4>
          <form action="{{route ('permissions.update', $permission->id)}}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
              <label for="name">Nombre del permiso</label>
                <input type="text" class="form-control" name="name" value={{old('name', $permission->name)}} autofocus>
                  </div>

                      <div class="form-row">
                      
                        <button type="submit" class="btn btn-primary">editar</button>
                  </div>

                  </form> 
               </div>
            </div>
          </div>
        </div>
      </div>
      @endsection