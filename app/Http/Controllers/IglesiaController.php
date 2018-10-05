<?php

namespace App\Http\Controllers;

use App\Iglesia;
use App\User;
use Illuminate\Http\Request;

class IglesiaController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iglesias = Iglesia::paginate();
        dd($iglesias);
        return view('iglesias.index', compact('iglesias'));
    }

    public function create() {
        $users = User::all('id','name');
        #dd($users);
        return view('iglesias.create',compact('users'));
    }

    function store(){

        $data = request()->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required|max:10',
            'arquidiocesis' =>  'required',
            'user' => 'required',
        ]);

        #dd($data);


        $iglesia  = new Iglesia($data);
        $iglesia->save();
        return redirect()->route('iglesias.index');
    }
}
