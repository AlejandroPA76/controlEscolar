

@extends('layouts.dashboard')
@section('content')

@php
    
// <?php
// SDK de Mercado Pago
// require __DIR__ .  '/vendor/autoload.php';
require base_path('vendor/autoload.php');

// Agrega credenciales
// MercadoPago\SDK::setAccessToken('PROD_ACCESS_TOKEN');
MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));
//


// <?php
// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->title = 'Mi producto';
$item->quantity = 1;
$item->unit_price = 75.56;
$preference->items = array($item);
$preference->save();
// 

@endphp

<div class="card mt-2">
        <div class="card-header">Realizar un pago</div>
        <div class="container">
            @if (isset($errors) && $errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session()->has('success'))
                <div class="alert alert-success">
                    <ul>
                        @foreach (session()->get('success') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="card-body">
            <form action="{{route('pagos')}}" method="POST" id="paymentForm">
                @csrf

                <div class="row">
                    <div class="col-auto">
                        <label>Ingrese la cantidad a pagar:</label>
                        <input type="number" min="5" step="0.01" class="form-control" name="value"
                            value="{{ mt_rand(500, 100000) / 100 }}" required>
                        <small class="form-text text-muted">
                            use valores decimales con un punto "."
                        </small>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label>Metodo de pago</label>
                        <div class="form-group" id="toggler">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                @foreach ($Pagos as $Pago)
                                    <label class="btn btn-outline-secondary rounded m-2 p-1">
                                        <input type="radio" name="plataforma_pago" value="{{ $Pago->id }}"
                                        data-target="#{{ $Pago->name }}Collapse"
                                        data-toggle="collapse"
                                        required
                                        >
                                        <img class="img-thumbnail" src="{{ asset($Pago->image) }}">
                                    </label>
                                @endforeach
                            </div>
                            {{-- @foreach ($Pagos as $Pago)
                                        <div
                                            id="{{ $Pago->name }}Collapse"
                                            class="collapse"
                                            data-parent="#toggler"
                                        >
                                            @includeIf('components.' . strtolower($Pago->name) . '-collapse')
                                        </div>
                                    @endforeach --}}
                        </div>
                    </div>
                </div>

                
                <div class="cho-container">
                    <button type="submit" id="payButton" class="btn btn-primary btn-lg">Pay</button>
                </div>
            </form>
        </div>
    </div>

    {{-- // SDK MercadoPago.js V2 --}}
<script src="https://sdk.mercadopago.com/js/v2"></script>


<script>
    // Agrega credenciales de SDK
      const mp = new MercadoPago("{{config('services.mercadopago.key')}}", {
            locale: 'es-AR'
      });
    
      // Inicializa el checkout
      mp.checkout({
          preference: {
              id: '{{$preference->id}}'
          },
          render: {
                container: '.cho-container', // Indica el nombre de la clase donde se mostrará el botón de pago
                label: 'Pagar', // Cambia el texto del botón de pago (opcional)
          }
    });
    </script>
    
@endsection

