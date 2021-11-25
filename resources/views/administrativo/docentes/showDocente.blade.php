@extends('layouts.master')

@section('content')
    

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!-- no additional media querie or css is required -->
<div class="container">
    <div class="row" style="height:100vh">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h3>Datos del Docente</h3>
                    <form>
                        <div class="form-group">
                          <label>Matricula</label>
                          <input type="text" class="form-control"  placeholder="Opcional">
                        </div>
                      
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputEmail4">Primer nombre</label>
                          <input type="email" class="form-control" id="inputEmail4" placeholder="">
                        </div>

                        <div class="form-group col-md-6">
                          <label for="inputPassword4">Segundo nombre</label>
                          <input type="password" class="form-control" id="inputPassword4" placeholder="">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputEmail4">Primer apellido</label>
                          <input type="email" class="form-control" id="inputEmail4" placeholder="">
                        </div>

                        <div class="form-group col-md-6">
                          <label for="inputPassword4">Segundo apellido</label>
                          <input type="password" class="form-control" id="inputPassword4" placeholder="">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputEmail4">usuario</label>
                          <input type="email" class="form-control" id="inputEmail4" placeholder="">
                        </div>

                        <div class="form-group col-md-6">
                          <label for="inputPassword4">Contraseña</label>
                          <input type="password" class="form-control" id="inputPassword4" placeholder="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputAddress2">Confirmar contraseña</label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="">
                      </div>
                      <button type="submit" class="btn btn-primary">Registrar</button>
                    </form> 
        
                
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection