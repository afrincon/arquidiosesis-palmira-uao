<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ayuda extends Model
{
    protected $table = 'ayudas';
    public $timestamps = true;
    protected $fillable = array('fecha_ayuda','id_tipoayuda', 'id_beneficiario', 'id_iglesia', 'observaciones');
    protected $primaryKey = "id_ayuda";

    public function iglesia(){
        return $this->hasOne('App\Iglesia', 'id', 'id_iglesia');
    }
    public function beneficiario(){
        return $this->hasOne('App\Beneficiario', 'id_beneficiario', 'id_beneficiario');
    }
    public function tipoAyuda(){
        return $this->hasOne('App\TipoAyuda', 'id', 'id_tipoayuda');
    }


}
