<?php

namespace App\Http\Controllers;

use App\iglesia;
use App\Ayuda;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function reporteIglesia(){
        return view('admin.reportes.iglesias');
    }

    public function listadoIglesias(Request $request){

        $data = request()->validate([
            'id_iglesia' => 'required',
            'fecha_inicial' => 'required',
            'fecha_final' =>  'required',
        ]);


        
        $ayuda = Ayuda::with(['iglesia' => function($query) {
            $query->where('id', '=', 4);
        }])->get();
        return $ayuda->count();
        
        /*$iglesia = Iglesia::with(['ayudas' => function ($query){
            $query->where('id_iglesia', '=', 2);
        }])->get();        

        return $iglesia;*/
        
    }
}
