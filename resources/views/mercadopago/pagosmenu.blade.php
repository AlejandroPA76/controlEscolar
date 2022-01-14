@extends('layouts.dashboard')
@section('content')
<h3>mercado pagos</h3>

<div class="container">
<form action="{{route('pagar.a')}}" method="POST">
    @csrf
     <div class="form-group">
    <label>Ingrese la cantidad a pagar</label>
      <input type="number" name="precio" required>

   </div>
   <div class="form-group">
       <button type="submit" class="btn btn-dark">pagar</button>
   </div> 
</form>
  
       
</div>




@endsection