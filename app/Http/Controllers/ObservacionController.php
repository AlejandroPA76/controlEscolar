<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\Grupo;
use App\Models\Observacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Psy\Command\WhereamiCommand;

class ObservacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->hasRole('SuperAdmin')) {
            $grupos = Grupo::all();
        }
        if (auth()->user()->hasRole('Tutor')) {

            $estudiantes = DB::table('observacions')
                ->select('observacions.observacion', 'estudiantes.nombre', 'estudiantes.apellido_p', 'estudiantes.apellido_m')
                ->join('estudiantes', 'estudiantes.id', '=', 'observacions.estudiante_id')
                ->join('tutors', 'tutors.id', '=', 'estudiantes.tutor_id')
                ->join('users', 'users.id', '=', 'tutors.user_id')
                ->where('users.id', '=', auth::user()->id)
                ->get();

            return view('tutor.observaciones.index', compact('estudiantes'));
        }
        if (auth()->user()->hasRole('Docente')) {
            $grupos = DB::table('grupos')
                ->select('grupos.id', 'grupos.grupo_nombre', 'grupos.grado', 'nivels.nivel')
                ->join('docentes', 'docentes.id', '=', 'grupos.docente_id')
                ->join('users', 'users.id', '=', 'docentes.user_id')
                ->join('nivels', 'nivels.id', '=', 'grupos.nivel_id')
                ->where('users.id', '=', auth::user()->id)
                ->get();
        }
        //return $grupos; 
        return view('docente.observaciones.index', compact('grupos'));
    }

    public function showList($id)
    {

        $estudiantes = DB::table('estudiantes')
            ->select('estudiantes.*')
            ->join('lista_grupos', 'lista_grupos.estudiante_id', '=', 'estudiantes.id')
            ->join('grupos', 'grupos.id', '=', 'lista_grupos.grupo_id')
            ->join('docentes', 'docentes.id', '=', 'grupos.docente_id')
            ->where('grupos.id', '=', $id)
            ->get();

        return view('docente.observaciones.showEstudiantes', compact('estudiantes'));
    }

    public function showFormObservacion($id)
    {
        $estudiante = Estudiante::find($id);

        $docente = DB::table('docentes')
            ->select('docentes.id')
            ->where('docentes.user_id', '=', auth::user()->id)
            ->get();

        //var_dump($docente);
        return view('docente.observaciones.sendObservacion', compact('estudiante', 'docente'));
    }

    public function showObservacionEstudiante($id)
    {
        $observaciones = DB::table('users')
            ->select('docentes.nombre', 'estudiantes.matricula', 'observacions.observacion', 'observacions.created_at')
            ->join('docentes', 'users.id', '=', 'docentes.user_id')
            ->join('observacions', 'observacions.docente_id', '=', 'docentes.id')
            ->join('estudiantes', 'estudiantes.id', 'observacions.estudiante_id')
            ->where('estudiantes.id', '=', $id)
            ->get();

        //var_dump($estudiantes);
        return view('docente.observaciones.showObservaciones', compact('observaciones'));
    }

    public function sendMensaje(Request $request)
    {
        $grupos = DB::table('grupos')
                ->select('grupos.id', 'grupos.grupo_nombre', 'grupos.grado', 'nivels.nivel')
                ->join('docentes', 'docentes.id', '=', 'grupos.docente_id')
                ->join('users', 'users.id', '=', 'docentes.user_id')
                ->join('nivels', 'nivels.id', '=', 'grupos.nivel_id')
                ->where('users.id', '=', auth::user()->id)
                ->first();

        $obs = new Observacion();

        //$data  =  ListaGrupo::create($request->only('estd_id','grup_id','clic_id'));
        $obs->estudiante_id = $request->estudiante_id;
        $obs->docente_id = $request->docente_id;
        $obs->observacion = $request->mensaje;
        $obs->estado = 'Enviado';

        $obs->save();

        return redirect()->route('docente.grupo_asignados_estudiantes', $grupos->id)->withSuccess("¡La observacion se envio correctamente!");
    }
}
