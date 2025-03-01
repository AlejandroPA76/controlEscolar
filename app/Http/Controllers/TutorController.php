<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstudianteRequest;
use App\Models\Tutor;
use App\Models\User;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Spatie\Permission\Contracts\Role as ContractsRole;
use Spatie\Permission\Models\Role;
use App\Http\Requests\TutorRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;




class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $tutores = Tutor::Paginate(10);
        return view('administrativo.tutores.indexTutores', compact('tutores', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all()->pluck('name', 'id');
        return view('administrativo.tutores.createdTutores', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TutorRequest $request)
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

        $tutores = Tutor::create($request->only(
            'nombre',
            'apellido_p',
            'apellido_m',
        ) +
            [
                'user_id' => $user
            ]);


        $tutor = Tutor::latest()->first()->id;

        $pruebas = array([$request->only('nombrealumno', 'apellido_p_a', 'apellido_m_a', 'matricula')]);

        //foreach donde recorro todos los inputs y el resultado se muestra en una lista de nombrealumno,apellidos y matricula 

        foreach ($pruebas as list($a)) {

            //variable con la que obtengo el numero de nombres que hay en el input y esa son las iteraciones del for 

            $max = count($a['nombrealumno']);

            //recorro cada una de las listas de datos es decir  

            for ($i = 0; $i < $max; $i++) {

                //echo '<pre>'.print_r($a['nombrealumno'][$i], true).'</pre>'; 
                //echo '<pre>'.print_r($a['apellido_p_a'][$i], true).'</pre>'; 
                //echo '<pre>'.print_r($a['apellido_m_a'][$i], true).'</pre>'; 
                //echo '<pre>'.print_r($a['matricula'][$i], true).'</pre>'; 
                $estudiante = new Estudiante;
                $estudiante->nombre = $a['nombrealumno'][$i];
                $estudiante->apellido_p = $a['apellido_p_a'][$i];
                $estudiante->apellido_m = $a['apellido_m_a'][$i];
                $estudiante->matricula = $a['matricula'][$i];
                $estudiante->tutor_id = $tutor;
                $estudiante->save();
            }
            //echo '<pre>'.print_r($a, true).'</pre>'; 
        }
        //$roles = $request->input('roles', []);
        $roles = $request->input('roles');
        $users->syncRoles($roles);

        return redirect()->route('admin.indexTutores')->withSuccess('¡Los datos del tutor fueron agregados correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function show(Tutor $tutor, User $user)
    {

        $tutor->load('roles');
        $tutor = DB::table('users')->select('users.id', 'users.name', 'users.email', 'tutors.id', 'tutors.nombre', 'tutors.apellido_p', 'tutors.apellido_m')
            ->join('tutors', 'user_id', '=', 'users.id')
            ->where('tutors.id', 'LIKE', $tutor->id)
            ->first();
        // dump($tutor);
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
        $roles = Role::all()->pluck('name', 'id');
        $tutor->load('roles');
        $tutor = DB::table('users')
            ->select('users.id', 'users.name', 'users.email', 'tutors.id', 'tutors.nombre', 'tutors.apellido_p', 'tutors.apellido_m')
            ->join('tutors', 'user_id', '=', 'users.id')
            ->where('tutors.id', 'LIKE', $tutor->id)
            ->first();

        return view('administrativo.tutores.editTutores', compact('tutor', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tutor $tutor, User $user)
    {
        $data = $request->only('nombre', 'apellido_p', 'apellido_m');
        $correo = $request->input('email');
        $contraseña = $request->input('password');
       
       if($correo)
        $data1 = DB::table('users')
            ->where('tutors.id', 'LIKE', $tutor->id)
            ->join('tutors', 'users.id', '=', 'tutors.user_id')
            ->update(['email' => $correo]);

        if ($contraseña)
          $data1 = DB::table('users')
            ->where('tutors.id', 'LIKE', $tutor->id)
            ->join('tutors', 'users.id', '=', 'tutors.user_id')
            ->update(['password' => bcrypt($contraseña)]);            
        

        $tutor->update($data);
        $roles = $request->input('roles', []);
        $tutor->syncRoles($roles);

        return redirect()->route('admin.showTutores', $tutor->id)
            ->withSuccess("¡Los datos del tutor {$tutor->nombre} han sido actualizados!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tutor $tutor, Estudiante $estudiante)
    {
        $delTutor = DB::table('tutors')
            ->select('tutors.id', 'tutors.nombre', 'tutors.apellido_p', 'tutors.apellido_m', 'estudiantes.nombre', 'estudiantes.apellido_p', 'estudiantes.apellido_m', 'lista_grupos.estudiante_id')
            ->join('estudiantes', 'estudiantes.tutor_id', '=', 'tutors.id')
            ->join('lista_grupos', 'estudiantes.id', '=', 'lista_grupos.estudiante_id')
            ->where('tutors.id', '=', $tutor->id)
            ->first();
        //return $delTutor;
        if ($delTutor != null) {
            return redirect()->route('admin.indexTutores')
                ->withErrors("¡El tutor {$tutor->nombre} no se puede eliminar debido a que tiene alumnos asignados en un grupo, para poder eliminar al tutor debera de dar de baja al alumno de dicho grupo o eliminar el grupo en el que esta asignado!");
        } else {

        $deleuser=DB::table('users')
        ->where('id','=',$tutor->user_id)
        ->delete();
        return redirect()->route('admin.indexTutores')->withSuccess("¡El tutor {$tutor->nombre} ha sido eliminado!");
        }
    }

    public function misPagos(){

        $historial=DB::table('pagos')
        ->where('id_tutor','=',Auth::id())
        ->get();
        return view('tutor.misPagos',compact('historial'));
    }
}
