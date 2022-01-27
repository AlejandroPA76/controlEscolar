@extends('layouts.dashboard')
@section('content')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!-- no additional media querie or css is required -->
<style type="text/css">
  
  label {
    display: block;
    font: 1rem 'Fira Sans', sans-serif;
}

input,
label {
    margin: .4rem 0;
}
</style>
<div class="container-fluid mt-3">
        <div class="row justify-content-center align-items-center" style="height:100vh">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                      <h1>Historial de Pagos</h1>
                       
                        <form action="{{route('historialPagos')}}" method="get" autocomplete="off">      
                          
                         <div class="container">
                                  <div class="row align-items-center">
                                    <div class="col">

                                       <label >Buscar por mes</label>
                                      <input type="month" name="fecha" min="2021-01" >
                                      <button type="submit" class="btn btn-dark">Buscar</button>
                                    </div>
                                     
                                    </div>
                                       </div>
                          </form>
                        
                         
                       
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Status del pago</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Fecha</th>
      <th scope="col">Accion</th>

    </tr>
  </thead>
  <tbody>
     @foreach($historialPagos as $hpagos)
   <tr>
   
     <td>{{$hpagos->id}}</td>
     <td>{{$hpagos->nombre_tutor}}</td>
     <td>{{$hpagos->apellido_p_tutor}} {{$hpagos->apellido_m_tutor}}</td>
     <td>{{$hpagos->status}}</td>
     <td>{{$hpagos->cantidad_pagada}}</td>
     <td>{{$hpagos->created_at}}</td>
     <td><a href="{{route('verPago',$hpagos->id)}}">Detalle del pago</a></td>
     
   </tr>
   @endforeach

  </tbody>
</table>
                             
                           
                      
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection