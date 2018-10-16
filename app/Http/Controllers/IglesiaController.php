<?php

namespace App\Http\Controllers;

use App\Iglesia;
use App\User;
use Illuminate\Http\Request;

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
        $iglesias = Iglesia::paginate();
        #dd($iglesias);
        return view('iglesias.index', compact('iglesias'));
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
            'telefono' => 'required|max:10|numeric',
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
        #dd($iglesia);
        $users = User::all('id','name');
        return view('iglesias.edit', compact('iglesia','users'));
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
}
