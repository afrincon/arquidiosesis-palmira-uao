<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::paginate();
        #dd($usuario);
        return view('usuarios.index', compact('usuarios'));
    }

    public function create() {
        $usuarios = Usuario::all('id','name');
        #dd($usuarios);
        return view('usuarios.create',compact('usuarios'));
    }

    public function store(){

        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'estado' => 'required',
        ]);

        $data['password'] = Hash::make($data['password']);

        #dd($data);

        $usuario  = new Usuario($data);
        $usuario->save();

        Flash::success("se ha registrado " . $usuario->name . " de forma exitosa!");

        return redirect()->route('usuarios.index');
    }

    public function edit($id) {
        $usuario = Usuario::findOrFail($id);
        #dd($iglesia);
        return view('usuarios.edit', compact('usuario'));
    }

    public function update($id) {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'estado' => 'required',
        ]);

        $usuario = Usuario::findOrFail($id);

        if (array_key_exists('password', $data)) {
            $data['password'] = Hash::make($data['password']);
        } else {
            $data['password'] = $usuario->password;
        }

        $usuario->name = $data['name'];
        $usuario->email = $data['email'];
        $usuario->password = $data['password'];
        $usuario->estado = $data['estado'];
        $usuario->save();

        return redirect()->route('usuarios.index');
    }
    public function show($id){
        return view('usuarios.show', ['usuario' => usuario::findOrFail($id)]);
    }	
}
