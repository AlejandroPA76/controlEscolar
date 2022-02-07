<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\DocenteRequest;
use Illuminate\Support\Facades\DB;


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
    public function store(DocenteRequest $request, Docente $docentes)
    {
        $users = User::create([
            'name' => request('nombre'),
            'email' => request('email')
        ] + [
            'password' => bcrypt(request()->input('password'))
        ]);


        // $ultimoregistro = Producto::latest()->first()->id;
        $user = User::latest()->first()->id;
        //echo($user);

        $docente = Docente::create($request->only(
            'nombre',
            'matricula',
            'apellido_p',
            'apellido_m',
        ) +
            [
                'user_id' => $user
            ]);
        $roles = $request->input('roles');
        $users->syncRoles($roles);

        return redirect()->route('admin.indexDocentes')->withSuccess('Docente creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function show(Docente $docentes)
    {
        // $estudiantes = DB::table('users')
        //     ->select('estudiantes.id','estudiantes.nombre','estudiantes.apellido_p','estudiantes.apellido_m','estudiantes.matricula','estudiantes.created_at')
        //     ->join('tutors','user_id','=','users.id')
        //     ->join('estudiantes','tutor_id','=','tutors.id')
        //     ->where('users.id','LIKE',auth::user()->id)
        //     ->paginate('3');

        // $docentes1 = DB::table('users')
        //     ->join('docentes', 'user_id', '=', 'users.id')
        //     ->select('users.email', 'docentes.nombre', 'docentes.apellido_m', 'docentes.apellido_p', 'docentes.matricula')
        //     ->where('users.id', 'LIKE', $id)
        //     ->first();


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
            'docentes' => $docentes,
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
            $data['contraseña'] = bcrypt($contraseña);

        $docentes->update($data);
        return redirect()->route('admin.showDocentes', $docentes->id)
            ->withSuccess("Los datos del docente {$docentes->nombre} han sido actualizados.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Docente $docentes)
    {

        $verificar = DB::table('grupos')
            ->select('grupos.docente_id')
            ->where('docente_id', '=', $docentes->id)
            ->first();

        if ($verificar == null) {
            //echo('se puede eliminar');
            $deldocentes=DB::table('users')
                ->where('id','=',$docentes->user_id)
                ->delete();
            
            //user_id

            return redirect()->route('admin.indexDocentes')
                ->withSuccess("El Docente {$docentes->nombre} ha sido borrado correctamente");
                
        } elseif ($verificar != null) {
            //echo('no se puede eliminar');
            return redirect()->route('admin.indexDocentes')
                ->withErrors("¡El Docente {$docentes->nombre} no se puede eliminar porque esta asignado a un grupo, elimine primero al grupo en donde está asignado el docente o edite la información del grupo!");
            // ->withErrors(['msg' => 'El Docente {$docentes->nombre} no se puede eliminar porque esta asignado a un grupo, elimine primero al grupo']);
        }
    }
}
