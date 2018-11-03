<?php

namespace App\Http\Controllers;

use App\iglesia;
use App\Ayuda;
use App\Beneficiario;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class ReporteController extends Controller
{
    public function reporteIglesia(){
        return view('admin.reportes.iglesias');
    }

    public function reporteBeneficiario(){
        return view('admin.reportes.beneficiario');
    }

    public function listadoIglesias(Request $request){

        $data = request()->validate([
            'id_iglesia' => 'required',
            'fecha_inicial' => 'required',
            'fecha_final' =>  'required',
        ]);
        $iglesia = Iglesia::findOrFail($data['id_iglesia']);
        
        $ayuda = Ayuda::whereHas('iglesia' ,function($query) use ($data) {
            $query->where('id', $data['id_iglesia']);
        })->where('ayudas.fecha_ayuda', '>=', $data['fecha_inicial'])
        ->where('ayudas.fecha_ayuda', '<=', $data['fecha_final'])->get();

        if($ayuda->count() > 0) {
            $pdf = PDF::loadView('admin.pdf.ayudas', compact('ayuda', 'iglesia'));
            return $pdf->download('Ayudasiglesia'.$iglesia->nombre.'.pdf');
        } 
        else {
            return redirect()->back()->with('status', 'No se encontraron resultados'); 
        }
        
    }

    public function listadoBeneficiarios(Request $request){

        $data = request()->validate([
            'id_beneficiario' => 'required',
            'fecha_inicial' => 'required',
            'fecha_final' =>  'required',
        ]);
        $iglesia = Beneficiario::findOrFail($data['id_beneficiario']);
        
        $ayuda = Ayuda::whereHas('beneficiario' ,function($query) use ($data) {
            $query->where('id_beneficiario', $data['id_beneficiario']);
        })->where('ayudas.fecha_ayuda', '>=', $data['fecha_inicial'])
        ->where('ayudas.fecha_ayuda', '<=', $data['fecha_final'])->get();

        if($ayuda->count() > 0) {
            $pdf = PDF::loadView('admin.pdf.beneficiario', compact('ayuda', 'iglesia'));
            return $pdf->download('Ayudasiglesia'.$iglesia->nombre.'.pdf');
        } 
        else {
            return redirect()->back()->with('status', 'No se encontraron resultados'); 
        }
        
    }
}
