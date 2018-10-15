<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class iglesia extends Model
{
    protected $table = 'iglesias';
    public $timestamps = true;
    protected $fillable = array('nombre', 'direccion', 'telefono', 'user_id', 'arquidiocesis','estado');

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function ayudas() {
        return $this->belongsTo('App\ayuda');
    }
}
