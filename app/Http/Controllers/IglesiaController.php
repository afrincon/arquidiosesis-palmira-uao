<?php

namespace App\Http\Controllers;

use App\Iglesia;
use App\User;
use App\ayuda;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class IglesiaController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
        public function __construct()
        {
        $this->middleware('auth');
        }

        /**
         * Show the application dashboard.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {    
            return view('iglesias.index');        
        }

    public function create() {
        
        $users = User::all('id','name');
        #dd($users);
        return view('iglesias.create',compact('users'));
    }

    public function store(){

        $data = request()->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required|numeric',
            'arquidiocesis' =>  'required',
            'user_id' => 'required',
            'estado' => 'required',
        ]);

        #dd($data);

        $iglesia  = new Iglesia($data);
        $iglesia->save();
        return redirect()->route('iglesias.index')->with('success', 'Iglesia agregada correctamente');
    }

    public function edit($id) {
        $iglesia = Iglesia::findOrFail($id);
        //dd($iglesia);
        return view('iglesias.edit', compact('iglesia'));
    }

    public function update(Request $request,$id) {
        
        #dd($iglesia);
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required|max:10|numeric',
            'arquidiocesis' =>  'required',
            'user_id' => 'required',
            'estado' => 'required',
        ]);
        $iglesia = Iglesia::findOrFail($id);
        $iglesia->fill($request->all());
        $iglesia->save();
        return redirect()->route('iglesias.index')->with('success', 'Iglesia ha sido actualizada');;
    }

    public function show($id){
        return view('iglesias.show', ['iglesia' => Iglesia::findOrFail($id)]);
    }

    public function searchChurch(Request $request) {
        $iglesias = Iglesia::where('nombre', 'like', '%'.$request->input('nombre').'%')->get();
        $iglesias->load('user');    
        return response()->json($iglesias);
    }

    public function getIglesias(Request $request){
        $iglesias = Iglesia::where('nombre', 'like', '%'.$request->input('nombre').'%')->get();
        return response()->json($iglesias);
    }

    public function consultarAyudas($id){
        $iglesia = Iglesia::findOrFail($id);
        $ayudas = ayuda::where('id_iglesia', '=', $id)->get();
        $ayudas->load('iglesia', 'beneficiario', 'tipoAyuda');

        $pdf = PDF::loadView('ayudas.pdf', compact('ayudas'));

        return $pdf->download('Ayudasiglesia'.$iglesia->nombre.'.pdf');
    }
}
