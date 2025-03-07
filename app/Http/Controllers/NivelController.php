<?php

namespace App\Http\Controllers;

use App\Models\Nivel;

use Illuminate\Http\Request;
use App\Http\Requests\StoreNivelRequest;
use App\Http\Requests\UpdateNivelRequest;
use Illuminate\Support\Facades\DB;

class NivelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nivels = Nivel::Paginate(5);
        return view('administrativo.niveles.index', compact('nivels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrativo.niveles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNivelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nivel = new Nivel;
        $nivel->nivel = $request->input('nivelname');
        $nivel->save();
        return redirect()->route('niveles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nivel  $nivel
     * @return \Illuminate\Http\Response
     */
    public function show(Nivel $nivel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nivel  $nivel
     * @return \Illuminate\Http\Response
     */
    public function edit(Nivel $nivel, $id)
    {
        $nvl = Nivel::findOrFail($id);
        return view('administrativo.niveles.edit', compact('nvl'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNivelRequest  $request
     * @param  \App\Models\Nivel  $nivel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNivelRequest $request, Nivel $nivel, $id)
    {
        $nvl = Nivel::findOrFail($id);
        $nvl->nivel = $request->input('nivelnameupdate');
        $nvl->save();
         return redirect()->route('niveles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nivel  $nivel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nivel $nivel, $id)
    {
        $buscarNivel=DB::table('nivels')
                    ->select('nivels.nivel','grupos.id')
                    ->join('grupos','grupos.nivel_id','=','nivels.id')
                    ->where('nivels.id','=',$id)
                    ->first();
       if($buscarNivel!=null){
       return redirect()->route('niveles.index')->withErrors("¡No se puede eliminar el nivel educativo debido a que esta siendo utilizado por uno o varios grupos, elimine los grupos relacionados al nivel educativo!");
       }else{
         $delnvl = Nivel::find($id);
        $delnvl->delete();
        return redirect()->route('niveles.index')->withSuccess("¡El nivel educativo se elimino correctamente!");
       }           
       
    }
}
