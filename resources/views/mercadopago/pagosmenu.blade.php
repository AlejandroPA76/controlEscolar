@extends('layouts.dashboard')
@section('content')
<div class="card mt-3">

    <div class="card-body">
        <div class="container">

        <div class="row">
            <div class="">
                <strong>
                    <label>Metodo de pago:</label>
                </strong>
                <br>

                <label>Mercado de pago</label>
                <img src="/img/plataforma-pagos/mercadopago.jpg" alt="" width="150" class="img-center">
            </div>
        </div>
        </div>

    </div>


    <div class="container">
        <form action="{{ route('pagar.a') }}" method="POST">
            @csrf
            <div class="form-group">
                <strong>

                    <label>Ingrese la cantidad a pagar:</label>
                </strong>
                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="cantidad a pagar" name="precio" required>
            </div>
            <div class="form-group">
                <strong>

                    <label>Ingrese el motivo del pago:</label>
                </strong>
                <textarea class="form-control" rows="3"
                    placeholder="Escribe el motivo del pago y nombre de los alumnos y el grado al que van a ingresar"
                    name="motivo" required></textarea>

            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-dark">Pagar</button>
            </div>
        </form>


    </div>




    </div>
    </div>
@endsection
