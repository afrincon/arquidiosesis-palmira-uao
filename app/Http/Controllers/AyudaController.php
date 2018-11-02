<?php

namespace App\Http\Controllers;

use App\Ayuda;
use App\TipoAyuda;
use Illuminate\Http\Request;

class AyudaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.ayudas.index');
    }

    public function create(){
        return view('admin.ayudas.create');
    }

    public function store(){
        $data = request()->validate([
            'fecha_ayuda' => 'required|date_format:Y-m-d|before:mañana|after:yesterday',
            'id_tipoayuda' => 'required',
            'id_beneficiario' =>  'required',
            'id_iglesia' => 'required',
        ]);        

        $ayuda  = new Ayuda($data);        
        $ayuda->save();
        return redirect()->route('ayudas.index')->with('status', 'Ayuda registrada correctamente');
    }

    public function edit($id) {
        $ayuda = Ayuda::findOrFail($id);
        return view('admin.ayudas.edit', compact('ayuda'));
    }

    public function update(Request $request, $id){
        $data = request()->validate([
            'fecha_ayuda' => 'required|date',
            'id_tipoayuda' => 'required',
            'id_beneficiario' =>  'required',
            'id_iglesia' => 'required',
            'observaciones' => '',
        ]);
        $ayuda = Ayuda::findOrFail($id);
        $ayuda->fill($request->all());
        $ayuda->save();
        return redirect()->route('ayudas.index')->with('statu', 'La ayuda ha sido actualizada');;
    }

    public function destroy($id) {
        $ayuda = Ayuda::findOrFail($id);
        $ayuda->delete();
        return response()->json('Deleted');
    }

    public function obtenerAyudas(Request $request){
        $ayudas = Ayuda::where('id_beneficiario', 'like', '%'.$request->input('id_beneficiario').'%')->paginate(10);
        $ayudas->load('iglesia', 'beneficiario', 'tipoAyuda');        
        return response()->json([
            'paginate'  =>  [
                'total'         =>  $ayudas->total(),
                'current_page'  =>  $ayudas->currentPage(),
                'per_page'      =>  $ayudas->perPage(),
                'last_page'     =>  $ayudas->lastPage(),
                'from '         =>  $ayudas->firstItem(),
                'to'    =>  $ayudas->lastPage(),
            ],
            'ayudas'    => $ayudas,

        ]);
    }

    public function obtenerTipoAyuda(){
        $tipo = TipoAyuda::all();
        return response()->json($tipo);
    }

    public function validarUltimaAyuda(Request $request){
        //dd($direccion);
        $ayuda = Ayuda::where('id_beneficiario', '=', $request->input('id_beneficiario'))->latest()->first();
        return response()->json($ayuda);        
    }
}
