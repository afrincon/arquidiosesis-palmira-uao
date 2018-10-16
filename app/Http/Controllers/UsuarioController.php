<?php

namespace App\Http\Controllers;

use App\User;
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
        $usuarios = User::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create() {
        $usuarios = User::all('id','name');
        return view('usuarios.create',compact('usuarios'));
    }

    public function store(){

        $data = request()->validate([
            'name' => 'required',
			'telefono' => 'required',
            'email' => 'required|email',
            'password' => 'required',
			'fecha_nacimiento' => 'required',
			'fecha_ingreso' => 'required',
            'estado' => 'required',
			'perfil' => 'required',
        ]);

        $data['password'] = Hash::make($data['password']);

        //dd($data);

        $User  = new User($data);
        $User->save();
        $User->roles()->attach($data['perfil']);
        return redirect()->route('usuarios.index');
    }

    public function edit($id) {
        $User = User::findOrFail($id);
        #dd($User);
        return view('usuarios.edit', compact('User'));
    }

    public function update($id) {
        $data = request()->validate([
            'name' => 'required',
			'telefono' => 'required',
            'email' => 'required|email',
            'password' => 'required',
			'fecha_nacimiento' => 'required',
			'fecha_ingreso' => 'required',
            'estado' => 'required',
			'perfil' => 'required',
        ]);

        $User = User::findOrFail($id);

        if (array_key_exists('password', $data)) {
            $data['password'] = Hash::make($data['password']);
        } else {
            $data['password'] = $User->password;
        }

        $User->name = $data['name'];
        $User->email = $data['email'];
        $User->password = $data['password'];
        $User->estado = $data['estado'];
		$User->telefono = $data['telefono'];
		$User->fecha_nacimiento = $data['fecha_nacimiento'];
		$User->fecha_ingreso = $data['fecha_ingreso'];
		$User->roles()->attach($data['perfil']);
        $User->save();

        return redirect()->route('usuarios.index');
    }
	
    public function show($id){
        return view('usuarios.show', ['User' => User::findOrFail($id)]);
    }	
}
