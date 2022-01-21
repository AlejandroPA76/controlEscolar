@extends('layouts.dashboard')
@section('content')
   <script src="https://sdk.mercadopago.com/js/v2"></script>
<h3>confirmar datos</h3>

<div class="container">

 <div class="form-group">
    <label>Monton a pagar:</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$total}}"  name="precio" disabled="false" required>
   </div>
   <div class="form-group">
    <label>Ingrese el motivo del pago:</label>
      <textarea class="form-control" rows="3" placeholder="Escribe el motivo del pago y nombre de los alumnos y el grado al que van a ingresar" name="motivo" disabled="false" required>{{$motivo}}</textarea>

   </div>

   <div class="form-group">
        <div class="checkout-btn" type="submit"></div>
   </div> 
      


   
</div>

<div>
 
</div>


@php 

 require_once("../vendor/autoload.php");

 $dt=DB::table('tutors')
->select('tutors.id','tutors.nombre','tutors.apellido_p','tutors.apellido_m','users.email')
->join('users','users.id','=','user_id')
->where('user_id','LIKE',auth()->user()->id)
->first();


//require_once 'vendor/autoload.php'; // You have to require the library from your Composer vendor folder
// Agrega credenciales-quitar EL TOKEN ANTES DE SUBIR A git
MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

         // Crea un objeto de preferencia
         $preference = new MercadoPago\Preference();

         // Crea un ítem en la preferencia
         $item = new MercadoPago\Item();
         $item->title ="#".$dt->id ." ". $dt->nombre . " ". $dt->apellido_p ." ".$dt->apellido_m." ".$dt->email;
         $item->quantity = 1;
         $item->unit_price = $total;
         $preference->items = array($item);
         $preference->payment_methods = array(
          "excluded_payment_types" => array(
            array("id" => "digital_wallet"),array("id" => "ticket"),array("id" => "atm")),

          "installments" => 1

         );

         $preference->binary_mode = true;
         $preference->back_urls = array(
          "success" => route('pagar.b'),
          "failure" => route('rechazado.a')
         );
         $preference->save();
@endphp   

<script>
// Agrega credenciales de SDK QUITAR EL TOKEN PARA SUBIR
  const mp = new MercadoPago("{{config('services.mercadopago.key')}}", {
        locale: 'es-MX'
  });

  // Inicializa el checkout
  mp.checkout({
      preference: {
          id: '{{$preference->id}}'
      },
      render: {
            container: '.checkout-btn', // Indica el nombre de la clase donde se mostrará el botón de pago
            label: 'Pagar', // Cambia el texto del botón de pago (opcional)
      }
});
</script>

@endsection