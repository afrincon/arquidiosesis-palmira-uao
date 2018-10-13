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
        $ayudas = Ayuda::paginate();
        #dd($ayudas);
        return view('ayudas.create', compact('ayudas'));
    }

    public function store(){
        
        $data = request()->validate([
            'fecha_ayuda' => 'required',
            'id_tipoayuda' => 'required',
            'id_beneficiario' =>  'required',
            'id_iglesia' => 'required',
        ]);

        #dd($data);

        $ayuda  = new Ayuda($data);
        #dd($ayuda);
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

    public function validarFecha($id){
        $validacion = DB::table('ayudas')->where('id_ayuda', '=', $id)->last();
        dd($validacion);
        return $validacion->fecha_ayuda;
    }


}
