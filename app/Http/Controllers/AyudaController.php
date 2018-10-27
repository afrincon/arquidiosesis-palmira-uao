<?php

namespace App\Http\Controllers;

use App\Ayuda;
use App\beneficiario;
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
        $beneficiarios = beneficiario::all();
        return view('ayudas.create', compact('ayudas','tiposAyuda', 'iglesias', 'beneficiarios'));
    }

    public function store(){
        
        $data = request()->validate([
            'fecha_ayuda' => 'required|date|after:yestarday',
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
        #dd($ayuda);
        $users = User::all('id','name');
        $iglesias = iglesia::all();
        $tiposAyuda = TipoAyuda::all();
        $beneficiarios = beneficiario::all();
        return view('ayudas.edit', compact('ayuda', 'iglesias', 'tiposAyuda', 'beneficiarios'));
    }

    public function update(Request $request,$id) {

        #dd($iglesia);
        $request->validate([
            'fecha_ayuda' => 'required|after:yestarday',
            'id_tipoayuda' => 'required',
            'id_beneficiario' =>  'required',
            'id_iglesia' => 'required',
        ]);
        $ayuda = Ayuda::findOrFail($id);
        $ayuda->fill($request->all());
        $ayuda->save();
        return redirect()->route('ayudas.index')->with('success', 'La ayuda ha sido actualizada');;
    }

    public function validarFecha(Request $request){

        $beneficiario = $request->input('id_beneficiario');
        $validacion = DB::table('ayudas')->where('id_beneficiario', '=', $beneficiario)->latest()->first();
        echo json_encode($validacion);
    }

    public function show($id){
        return view('ayudas.show', ['iglesia' => Iglesia::findOrFail($id)]);
    }

    public function pdfAyudas() {
        $ayudas = Ayuda::all();

        $pdf = PDF::loadView('ayudas.pdf', compact('ayudas'));

        return $pdf->download('listadoAyudas.pdf');

    }

    public function searchHelp(Request $request) {
        $ayudas = Ayuda::where('id_beneficiario', 'like', '%'.$request->input('id_beneficiario').'%')->get();
        $ayudas->load('iglesia', 'beneficiario', 'tipoAyuda');
        return response()->json($ayudas);
    }

    public function getAyudas(Request $request){
        $ayudas = Ayuda::where('id_beneficiario', 'like', '%'.$request->input('id_beneficiario').'%')->get();
        return response()->json($ayudas);
    }
}
