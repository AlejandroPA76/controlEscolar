<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docentes = Docente::Paginate(10);
        return view('administrativo.docentes.indexDocentes', compact('docentes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrativo.docentes.createdDocente');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Docente::create($request->only(
            'nombre',
            'matricula',
            'apellido_p',
            'apellido_m', 
            'usuario',) + [
            'contraseña' => bcrypt (request()->input('contraseña'))
         ]);

         return redirect()->route('admin.indexDocentes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function show(Docente $docentes)
    {
        // $tutor = Tutor::findOrFail($tutor);
        // return view('administrativo.showTutores')->with($tutor);

        return view('administrativo.docentes.showDocente', compact('docentes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function edit(Docente $docentes)
    {
        return view('administrativo.docentes.editDocente')->with([
            'docentes'=>$docentes,

        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Docente $docentes)
    {
        $data = $request->only('nombre', 'apellido_p', 'apellido_m', 'usuario');
        $contraseña = $request->input('contraseña');
        if ($contraseña)
        $data['contraseña']=bcrypt($contraseña);

        $docentes->update($data);
        return redirect()->route('admin.indexDocente')
        ->withSuccess("El usuario tutor con el id {$docentes->id} ha sido editado");

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Docente $docente)
    {
        $docente->delete();

        return redirect()->route('admin.indexDocente')
        ->withSuccess("El producto con el id {$docente->id} ha sido borrado");
    }
}
