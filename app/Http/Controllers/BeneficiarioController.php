<?php
namespace App\Http\Controllers;
use App\beneficiario;
use App\tipo_documento;
use App\User;

class BeneficiarioController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beneficiarios = beneficiario::paginate();
        #dd($beneficiarios);
        return view('beneficiarios.index', compact('beneficiarios'));
    }
    public function create() {
        $users = User::all('id','name');
        #dd($users);
        $tipoDocumento = tipo_documento::all();
        return view('beneficiarios.create',compact('users','tipoDocumento'));
    }
    function store(){
        $data = request()->validate([
            'documento' => 'required',
			'id_tipo_documento' => 'required',
			'nombre' => 'required',
			'apellido' => 'required',
			'estado' => 'required',
			'direccion' =>  'required',
            'telefono' => 'required|max:10',
            'clasificacion' => 'required',
            //user' => 'required',
        ]);
        #dd($data);
        $beneficiario  = new beneficiario($data);
        $beneficiario->save();
        return redirect()->route('beneficiarios.index')->with('success', 'Beneficiario agregado correctamente');
    }

    public function edit($id) {
        $beneficiario = Beneficiario::findOrFail($id);
        #dd($iglesia);
        $users = User::all('id','name');
        return view('beneficiarios.edit', compact('beneficiario','users'));
    }

    public function update($id)
    {
        $data = request()->validate([
            'documento' => 'required',
            'id_tipo_documento' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'estado' => 'required',
            'direccion' => 'required',
            'telefono' => 'required|max:10',
            'clasificacion' => 'required',
        ]);

        $beneficiario = Beneficiario::findOrFail($id);

        $beneficiario->documento = $data['documento'];
        $beneficiario->id_tipo_documento = $data['id_tipo_documento'];
        $beneficiario->nombre = $data['nombre'];
        $beneficiario->apellido = $data['apellido'];
        $beneficiario->estado = $data['estado'];
        $beneficiario->direccion = $data['direccion'];
        $beneficiario->telefono = $data['telefono'];
        $beneficiario->clasificacion = $data['clasificacion'];
        $beneficiario->save();

        return redirect()->route('beneficiarios.index');
    }

    public function show($id){
        #dd($id);   
        return view('beneficiarios.show', ['beneficiario' => beneficiario::findOrFail($id)]);
    }
}