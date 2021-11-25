<?php

namespace App\Http\Controllers;

use App\Models\Administrativo;
use App\Models\Tutor;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use App\Http\Controllers\Hash;
use Illuminate\Support\Facades\DB;

class AdministrativoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Administrativo  $administrativo
     * @return \Illuminate\Http\Response
     */
    public function show(Administrativo $administrativo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Administrativo  $administrativo
     * @return \Illuminate\Http\Response
     */
    public function edit(Administrativo $administrativo)
    {
        //
        //holaaaaaaa
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Administrativo  $administrativo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Administrativo $administrativo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Administrativo  $administrativo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Administrativo $administrativo)
    {
        //
    }
}
