<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
// use DB;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
    
    $estudiantes = DB::table('users')
    ->select('estudiantes.id','estudiantes.nombre','estudiantes.apellido_p','estudiantes.apellido_m','estudiantes.matricula','estudiantes.created_at')
    ->join('tutors','user_id','=','users.id')
    ->join('estudiantes','tutor_id','=','tutors.id')
    ->where('users.id','LIKE',auth::user()->id)
    ->paginate(3);
     //echo '<pre>'.print_r($estudiantes, true).'</pre>'; 
    //$estudiantes = json_decode(json_encode($estud), true);
        // Estudiante::Paginate(10);
    // return $estudiantes;
     return view('administrativo.estudiantes.indexEstudiante',compact('estudiantes'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrativo.estudiantes.createdEstudiante');

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
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        return view('administrativo.estudiantes.showEstudiante', compact('estudiante'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudiante $estudiante)
    {
        return view('administrativo.estudiantes.editEstudiante')->with([
            'estudiante'=>$estudiante,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        $data = $request->only('nombre', 'apellido_p', 'apellido_m', 'matricula');

        $estudiante->update($data);
        return redirect()->route('admin.indexEstudiantes')
        ->withSuccess("¡El estudiante {$estudiante->nombrealumno} ha sido actualizado!");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();

        return redirect()->route('admin.indexEstudiantes')
        ->withSuccess("¡El estudiante {$estudiante->nombrealumno} ha sido borrado!");
    }
}
