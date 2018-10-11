<?php

namespace App\Http\Controllers;

use App\Ayuda;
use Illuminate\Http\Request;

class AyudaController extends Controller
{
    public function index()
    {
        $ayudas = Ayuda::paginate();
        #dd($ayudas);
        return view('ayudas.index', compact('ayudas'));
    }

    public function create() {
        $users = User::all('id','name');
        #dd($users);
        return view('ayudas.create',compact('users'));
    }

    public function store(){

        $data = request()->validate([
            'id_ayuda' => 'required',
            'fecha_ayuda' => 'required',
            'id_tipoayuda' => 'required',
            'id_beneficiario' =>  'required',
            'id_iglesia' => 'required',
        ]);

        #dd($data);

        $ayuda  = new Ayuda($data);
        $ayuda->save();
        return redirect()->route('ayudas.index')->with('success', 'Ayuda registrada correctamente');
    }

    public function edit($id) {
        $ayuda = Ayuda::findOrFail($id);
        #dd($iglesia);
        $users = User::all('id','name');
        return view('ayudas.edit', compact('ayuda','users'));
    }

    public function update(Request $request,$id) {

        #dd($iglesia);
        $request->validate([
            'id_ayuda' => 'required',
            'fecha_ayuda' => 'required',
            'id_tipoayuda' => 'required',
            'id_beneficiario' =>  'required',
            'id_iglesia' => 'required',
        ]);
        $ayuda = Ayuda::findOrFail($id);
        $ayuda->fill($request->all());
        $ayuda->save();
        return redirect()->route('ayudas.index')->with('success', 'La ayuda ha sido actualizada');;
    }

}
