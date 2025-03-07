<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Http\Request;
use App\Http\Requests\DocenteRequest;
use Illuminate\Http\Requests\PagoRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;


class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$precio=12;
         return view('mercadopago.pagosmenu');
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $registrar = Pago::create($request->all());
        return redirect()->route('historialPagos')->withSuccess('¡Registro de pago exitoso!') ;
        // echo($registrar);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show(Pago $pago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit(Pago $pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pago $pago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pago $pago)
    {
        //
    }

    public function payment(Request $request){

        $total=$request->input('precio');
        $motivo=$request->input('motivo');
        //echo($hola);
        //guardo el motivo en una variable de sesion para poder traer el valor a la 
        //funcion sucess
        session_start ();
        $_SESSION['m'] = $motivo;
        return view('mercadopago.pagosconfirmar',compact('total','motivo'));
    }

    public function success(Request $request){
        //inicializo la variable de sesion
        session_start();
        //
        if(!empty($_SESSION['m'])){
        $motivo=$_SESSION['m'];


        //obtenemos el id del tutor logueado
        $us=auth::user()->id;
        //consultamos los datos del tutor en la tabla user y tabla tutor
        $datous=DB::table('tutors')
            ->select('users.id','tutors.nombre','tutors.apellido_p','tutors.apellido_m','users.email')
            ->join('users','users.id','=','user_id')
            ->where('user_id','LIKE',$us)
            ->first();
            //id del pago de mercadopago
        $pago_id=$request->get('payment_id');
        //mitoken
        $token=config('services.mercadopago.token');
        //peticion para saber el status y la cantidad del pago
        $response =Http::get("https://api.mercadopago.com/v1/payments/$pago_id" . "?access_token=$token");
        //decodificar la respuesta del servidor
        $response= json_decode($response);
        //dump($datous,$pago_id);
        //obtengo el status del pago
        $status= $response->status;
        //obtengo el monton que pague
        $total_pagado= $response->transaction_amount;
       
        //dump($datous,$motivo,$pago_id,$status,$total_pagado);
        //return $datous->nombre;
        if ($status=="approved") {
            $pago = new Pago();
        $pago->nombre_tutor=$datous->nombre;
        $pago->apellido_p_tutor=$datous->apellido_p;
        $pago->apellido_m_tutor=$datous->apellido_m;
        $pago->email=$datous->email;
        $pago->id_tutor=$datous->id;

        $pago->num_operacion=$pago_id;
        //$pago->motivo=$datous->nombre;
        $pago->status="pagado";
        $pago->cantidad_pagada=$total_pagado;
        //
        
        $pago->motivo=$motivo;
        unset($_SESSION['m']);
        $pago->save();
         return redirect()->route('home');
        }
    
    }
    else{
          return redirect()->route('home');
    }}

    public function fail(){
         return redirect()->route('home');
    }
}
