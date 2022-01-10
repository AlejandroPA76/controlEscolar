@extends('layouts.dashboard')
@section('content')
   <script src="https://sdk.mercadopago.com/js/v2"></script>
<h3>mercado pago</h3>
<div class="checkout-btn"></div>

<?php 
 require_once("../vendor/autoload.php");

//        require_once 'vendor/autoload.php'; // You have to require the library from your Composer vendor folder

   // Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-6101785241451295-010920-1cbfb100865c2051ffadb1885e00b8ab-212365906');

         // Crea un objeto de preferencia
         $preference = new MercadoPago\Preference();

         // Crea un ítem en la preferencia
         $item = new MercadoPago\Item();
         $item->title = 'Mi producto';
         $item->quantity = 1;
         $item->unit_price = 1000;
         $preference->items = array($item);
         $preference->save();
?>

<script>
// Agrega credenciales de SDK
  const mp = new MercadoPago('TEST-21999f0b-a6c3-44fd-8729-31485aad3460', {
        locale: 'es-MX'
  });

  // Inicializa el checkout
  mp.checkout({
      preference: {
          id: '<?php  echo $preference->id; ?>'
      },
      render: {
            container: '.checkout-btn', // Indica el nombre de la clase donde se mostrará el botón de pago
            label: 'Pagar', // Cambia el texto del botón de pago (opcional)
      }
});
</script>

@endsection