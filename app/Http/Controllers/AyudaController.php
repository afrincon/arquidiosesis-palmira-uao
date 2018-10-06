<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AyudaController extends Controller
{
    public function index()
    {
        $ayudas = Ayuda::paginate();
        //dd($ayudas);
        return view('ayudas.index', compact('ayudas'));
    }

    public function create() {
        return view('ayudas.create');
    }

    function store(Request $request){
        $data = request()->all();
        //dd($data);

        $ayuda  = new Ayuda($data);
        $ayuda->save();
        return redirect()->route('ayudas.index');
    }
}
