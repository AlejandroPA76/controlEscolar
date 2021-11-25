<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tutores = Tutor::Paginate(10);
        return view('administrativo.tutores.indexTutores', compact('tutores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrativo.tutores.createdTutores');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        Tutor::create($request->only(
            'nombre',
            'apellido_p',
            'apellido_m', 
            'usuario',) + [
            'contraseña' => bcrypt (request()->input('contraseña'))
         ]);

        $estudiante = new Estudiante;
        $estudiante->nombre=$request->input('nombrealumno');
        $estudiante->apellido_p=$request->input('apellido_p_a');
        $estudiante->apellido_m=$request->input('apellido_m_a');
        $estudiante->matricula=$request->input('matricula_a');
        $estudiante->save();



        return redirect()->route('admin.indexTutores');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function show(Tutor $tutor)
    {
        // $tutor = Tutor::findOrFail($tutor);
        // return view('administrativo.showTutores')->with($tutor);

        return view('administrativo.tutores.showTutores', compact('tutor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function edit(Tutor $tutor)
    {
        return view('administrativo.tutores.editTutores')->with([
            'tutor'=>$tutor,

        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tutor $tutor)
    {
        $data = $request->only('nombre', 'apellido_p', 'apellido_m', 'usuario');
        $contraseña = $request->input('contraseña');
        if ($contraseña)
        $data['contraseña']=bcrypt($contraseña);

        $tutor->update($data);
        return redirect()->route('admin.indexTutores')
        ->withSuccess("El usuario tutor con el id {$tutor->id} ha sido editado");

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tutor $tutor)
    {
        $tutor->delete();

        return redirect()->route('admin.indexTutores')
        ->withSuccess("El producto con el id {$tutor->id} ha sido borrado");
    }
}
