<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UsuarioRequest;
use Illuminate\Support\Facades\DB;


use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterUsersRequest; // Validar informacion de los datos de registro de usuarios
use App\Models\Tutor;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(25);
        return view('users.index', compact('users'));
    }

    public function create()
    {

        $roles = Role::all()->pluck('name', 'id');
        return view('users.create', compact('roles'));
    }

    public function store(UsuarioRequest $request)
    {
        // $request->validate([
        //     'name' => 'required|min:3|max:5',
        //     'username' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required'
        // ]);
        $user = User::create($request->only('name', 'username', 'email')
            + [
                'password' => bcrypt($request->input('password')),
            ]);

        $roles = $request->input('roles', []);
        $user->syncRoles($roles);

        // session()->flash('success', "el usuario ha sido creado exitosamente");

        return redirect()->route('users.index', $user->id)
            ->withSuccess('Usuario creado correctamente');
    }

    public function show(User $user)
    {
        // $user = User::findOrFail($id);
        // dd($user);
        $user->load('roles');
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::all()->pluck('name', 'id');
        $user->load('roles');
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {

        // $user=User::findOrFail($id);
        $data = $request->only('name', 'username', 'email');
        $password = $request->input('password');
        if ($password)
            $data['password'] = bcrypt($password);
        // if(trim($request->password)=='')
        // {
        //     $data=$request->except('password');
        // }
        // else{
        //     $data=$request->all();
        //     $data['password']=bcrypt($request->password);
        // }

        $user->update($data);

        // $roles = $request->input('roles', []);
        // $user->syncRoles($roles);
        return redirect()->route('users.show', $user->id)->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy(User $user)
    {
        $verificar = DB::table('tutors')
            ->select('tutors.user_id')
            ->where('user_id', '=', $user->id)
            ->first();

    //    return  $verificar;
        if ($verificar != null) {
            // echo ('esta en uso');
            return redirect()->route('users.index')->withErrors("Para poder eliminar a este usuario debes de dirigirte al menú de docente o tutor al que le pertenezca el usuario") ;

        }else{
            // echo ('no está en uso');
            if (auth()->user()->id == $user->id) {
                return redirect()->route('users.index')->withErrors('No te puedes eliminar a ti mismo');
            }
    
            $user->delete();
            return back()->withSuccess('Usuario eliminado correctamente');
        }

    }
}
