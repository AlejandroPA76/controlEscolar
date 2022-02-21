<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Imagen;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
//use illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (auth()->user()->hasRole('Tutor')) {
            $estudiantes = DB::table('users')
                ->select('estudiantes.id', 'estudiantes.nombre', 'estudiantes.apellido_p', 'estudiantes.apellido_m', 'estudiantes.matricula', 'estudiantes.created_at')
                ->join('tutors', 'user_id', '=', 'users.id')
                ->join('estudiantes', 'tutor_id', '=', 'tutors.id')
                ->where('users.id', 'LIKE', auth::user()->id)
                ->paginate('3');

            return view('administrativo.estudiantes.indexEstudiante', compact('estudiantes'));
        }
        if (auth()->user()->hasRole('Docente')) {
            $estudiantes = DB::table('users')
                ->select('estudiantes.*')
                ->join('docentes', 'docentes.user_id', '=', 'users.id')
                ->join('grupos', 'grupos.docente_id', '=', 'docentes.id')
                ->join('lista_grupos', 'lista_grupos.grupo_id', '=', 'grupos.id')
                ->join('estudiantes', 'estudiantes.id', '=', 'lista_grupos.estudiante_id')
                ->where('users.id', '=', auth::user()->id)
                // ->get();
                ->paginate('30');

            return view('administrativo.estudiantes.indexEstudiante', compact('estudiantes'));
        } else {
            $estudiantes = Estudiante::all();
            $estudiantes = Estudiante::Paginate(10);

            return view('administrativo.estudiantes.indexEstudiante', compact('estudiantes'));
        }
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
            'estudiante' => $estudiante,
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
        $data = $request->only('nombre', 'apellido_p', 'apellido_m', 'matricula', 'foto');
<<<<<<< HEAD


        if ($request->hasFile('foto') and $request->validate(['foto' => 'required|image|max:2048'])) {
=======
       
        // $foto = request()->except('_token');
        // echo($foto);
        
        if($request->hasFile('foto') and $request->validate(['foto'=>'required|image|max:2048'])){
>>>>>>> e662c8667ebde5cc38f2113d4bb8b1813eb037d3

            $estudiante = Estudiante::findOrFail($estudiante->id);
            Storage::delete('public/' . $estudiante->foto);
            $data['foto'] = $request->file('foto')->store('uploads', 'public');
        }

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
