<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_documento extends Model
{
    //
    protected $table = 'tipo_documento';
    public function  tipo_documento_beneficiario(){
        return $this->hasMany('App\beneficiario', 'id_tipo_documento', 'id');
    }
}
