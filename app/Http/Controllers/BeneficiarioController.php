<?php
namespace App\Http\Controllers;
use App\beneficiario;
use App\tipo_documento;
use App\User;
use Illuminate\Validation\Rule;
use Illiminate\Config\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BeneficiarioController extends Controller
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

   // function store(){
    
     function store(Request $request){
       
        $data = request()->validate([

               'documento' =>[ Rule::unique('beneficiarios')->where(function ($query) use ($request){
                return $query->where('id_tipo_documento', $request->id_tipo_documento);
            })],
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
        $tipoDocumento = tipo_documento::all();
        return view('beneficiarios.edit', compact('beneficiario','users', 'tipoDocumento'));
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

    public function validarDireccion(Request $request){
        $direccion = $request->input('direccion');
        
        $validacion = DB::table('beneficiarios')->where('direccion', '=', $direccion)->latest()->first();
    
        echo json_encode($validacion);
    }
	
    public function searchBeneficiarios(Request $request) {
        $beneficiario = DB::table('beneficiarios')->where('nombre', 'like', '%'.$request->input('nombre').'%')->get();
        return response()->json($beneficiario);
    }

    public function getBeneficiarios(Request $request){
        $beneficiario = DB::table('beneficiarios')->where('nombre', 'like', '%'.$request->input('nombre').'%')->get();
        return response()->json($beneficiario);
    }	
}