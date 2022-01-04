<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Docente;
use App\Models\Nivel;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //obtengo todos los grupos para desplegarlos en una tabla
        $grupos=Grupo::all();
        return view('administrativo.grupos.index',compact('grupos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        //trago todos los docente y los guardo el docenteslist y luego lo mando a la vista
        //crear grupo, eso con el fin de seleccional al docente con un combobox
        $docenteslist=Docente::all();
        $nvls=Nivel::all();
        return view('administrativo.grupos.create',compact('docenteslist','nvls'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function show(Grupo $grupo)
    {
               
            
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function edit(Grupo $grupo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grupo $grupo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grupo $grupo)
    {
        //
    }


}
