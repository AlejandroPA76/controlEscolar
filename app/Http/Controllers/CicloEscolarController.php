<?php

namespace App\Http\Controllers;

use App\Models\CicloEscolar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $buscarCiclo=DB::table('ciclo_escolars')
                    ->select('ciclo_escolars.id','ciclo_escolars.ciclo','lista_grupos.id')
                    ->join('lista_grupos','ciclo_escolars.id','=','lista_grupos.ciclo_id')
                    ->where('ciclo_escolars.id','=',$ciclo->id)
                    ->first();
        if ($buscarCiclo!=null) {
        return redirect()->route('ciclos.index')->withErrors("No se puede eliminar el ciclo escolar, debido a que esta en uso por uno o varios grupos");           
                           }
        else{
        $ciclo->delete();
        return redirect()->route('ciclos.index')->withSuccess("¡El ciclo escolar se elimino correctamente!");
        }                   
       

    }
}
