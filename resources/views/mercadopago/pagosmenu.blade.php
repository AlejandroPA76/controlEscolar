@extends('layouts.dashboard')
@section('content')
<h3>mercado pagos</h3>

<div class="container">
<form action="{{route('pagar.a')}}" method="POST">
    @csrf
     <div class="form-group">
    <label>Ingrese la cantidad a pagar:</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="cantidad a pagar"  name="precio" required>
   </div>
   <div class="form-group">
    <label>Ingrese el motivo del pago:</label>
      <textarea class="form-control" rows="3" placeholder="Escribe el motivo del pago y nombre de los alumnos y el grado al que van a ingresar" name="motivo" required></textarea>

   </div>
   <div class="form-group">
       <button type="submit" class="btn btn-dark">pagar</button>
   </div> 
</form>
  
       
</div>




@endsection