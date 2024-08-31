<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.usuarios.index')->only('index');
        $this->middleware('can:admin.usuarios.create')->only('create', 'store');
        $this->middleware('can:admin.usuarios.show')->only('show');
        $this->middleware('can:admin.usuarios.edit')->only('edit', 'update');
        $this->middleware('can:admin.usuarios.destroy')->only('destroy');
    } 
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::paginate(10);
        $roles = Role::all();
        return view('admin.usuarios.index', compact('usuarios', 'roles'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request->first_name.' '.$request->last_name, 
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.usuarios.index')
            ->withSuccess(__('Usuario Creado Correctamente'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $usuario)
    {
        return view('admin.usuarios.show', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $usuario)
    {
        $usuario->roles()->sync($request->roles);

        return redirect()->route('admin.usuarios.index')
            ->withSuccess(__('Usuario Actualizado Correctamente.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $usuario)
    {
        $usuario->delete();

        return redirect()->route('admin.usuarios.index')
            ->withSuccess(__('Usuario Eliminado Correctamente'));
    }
}
