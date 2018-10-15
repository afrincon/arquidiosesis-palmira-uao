<?php

namespace App\Http\Controllers;
#Cambio Ayuda - ayuda
use App\ayuda;
use App\iglesia;
use App\TipoAyuda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class AyudaController extends Controller
{
    public function __construct()
    {
        #$this->middleware('auth');
    }

    public function index()
    {
        $ayudas = Ayuda::paginate();
        #dd($ayudas);
        return view('ayudas.index', compact('ayudas'));
    }

    public function create() {
        $ayudas = Ayuda::paginate();
        $tiposAyuda = TipoAyuda::all();
        #dd($tiposAyuda);
        $iglesias = iglesia::all();
        #dd($iglesias);
        return view('ayudas.create', compact('ayudas','tiposAyuda', 'iglesias'));
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

    public function edit($id_ayuda) {
        $ayuda = Ayuda::findOrFail($id_ayuda);
        #dd($ayuda);
        $users = User::all('id','name');
        return view('ayudas.edit', compact('ayuda'));
    }

    public function update(Request $request,$id) {

        #dd($iglesia);
        $request->validate([
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
        $validacion = DB::table('ayudas')->where('id_beneficiario', '=', $id)->latest()->first();
        #dd($validacion->fecha_ayuda);
        return $validacion->fecha_ayuda;
    }


}
