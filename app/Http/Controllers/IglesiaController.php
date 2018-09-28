<?php

namespace App\Http\Controllers;

use App\Iglesia;
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
        //dd($iglesias);
        return view('iglesias.index', compact('iglesias'));
    }

    public function create() {
        return view('iglesias.create');
    }

    function store(Request $request){
        $data = request()->all();
        //dd($data);

        $iglesia  = new Iglesia($data);
        $iglesia->save();
        return redirect()->route('iglesias.index');
    }
}
