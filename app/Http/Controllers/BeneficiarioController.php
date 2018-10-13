<?php
namespace App\Http\Controllers;
use App\beneficiario;
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
        return view('beneficiarios.create',compact('users'));
    }
    function store(){
        $data = request()->validate([
            'id_beneficiario' => 'required',
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
        return redirect()->route('beneficiarios.index');
    }
}