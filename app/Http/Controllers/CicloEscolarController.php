<?php

namespace App\Http\Controllers;

use App\Models\CicloEscolar;
use Illuminate\Http\Request;

class CicloEscolarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciclos = CicloEscolar::Paginate(20);

        return view('administrativo.ciclos.index', compact('ciclos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrativo.ciclos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ciclos =CicloEscolar::create($request->only('ciclo'));
        return redirect()->route('ciclos.index')->withSuccess('¡Ciclo escolar agregado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CicloEscolar  $cicloEscolar
     * @return \Illuminate\Http\Response
     */
    public function show(CicloEscolar $cicloEscolar)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CicloEscolar  $cicloEscolar
     * @return \Illuminate\Http\Response
     */
    public function edit(CicloEscolar $ciclo)
    {
        // $ciclo=CicloEscolar::all();
        return view('administrativo.ciclos.edit')->with([
            'ciclo'=> $ciclo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CicloEscolar  $cicloEscolar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CicloEscolar $ciclo)
    {
        // $ciclo->update($request->all());

        $data = $request->only('ciclo');
        $ciclo->update($data);

        return redirect()->route('ciclos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CicloEscolar  $cicloEscolar
     * @return \Illuminate\Http\Response
     */
    public function destroy(CicloEscolar $ciclo)
    {
        $ciclo->delete();

        return redirect(route('ciclos.index'));

    }
}
