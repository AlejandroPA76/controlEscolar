@extends('layouts.dashboard')
@section('content')
   <script src="https://sdk.mercadopago.com/js/v2"></script>
<h3>confirmar datos</h3>

<div class="container">
  <div class="form-group">
    <label>el monto a pagar es:</label>
    <input type="number" value="{{$total}}" readonly>
  </div>

  <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">$</span>
  </div>
  <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" value="{{$total}}">
  <div class="input-group-append">
    <span class="input-group-text">.00</span>
  </div>
</div>

   <div class="form-group">
        <div class="checkout-btn" type="submit"></div>
   </div> 
      


   
</div>

<div>
 
</div>


@php 

 require_once("../vendor/autoload.php");
//require_once 'vendor/autoload.php'; // You have to require the library from your Composer vendor folder
// Agrega credenciales-quitar EL TOKEN ANTES DE SUBIR A git
MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

         // Crea un objeto de preferencia
         $preference = new MercadoPago\Preference();

         // Crea un ítem en la preferencia
         $item = new MercadoPago\Item();
         $item->title = "Mi producto";
         $item->description= "holaaaa";
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
          "success" => route('pagar.ok')
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