<?php

namespace App\Http\Controllers;

use App\Models\ListaGrupo;
use App\Models\Grupo;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ListaGrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\ListaGrupo  $listaGrupo
     * @return \Illuminate\Http\Response
     */
    public function show(ListaGrupo $listaGrupo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ListaGrupo  $listaGrupo
     * @return \Illuminate\Http\Response
     */
    public function edit(ListaGrupo $listaGrupo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ListaGrupo  $listaGrupo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListaGrupo $listaGrupo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ListaGrupo  $listaGrupo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListaGrupo $listaGrupo, Estudiante $estudiante, $id)
    {
       
        $bajaAlumno=listaGrupo::findOrFail($id);
        $bajaAlumno->delete();

        
             
        return redirect()->back();
    }


}
