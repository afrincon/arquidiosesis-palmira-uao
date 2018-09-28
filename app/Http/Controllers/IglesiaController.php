<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Iglesia;

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
        return view('iglesias.index', compact('iglesias'));
    }

    public function crearIglesia() {
        return view('iglesias.create');
    }
}
