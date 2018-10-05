<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class iglesia extends Model
{
    protected $table = 'iglesias';
    public $timestamps = true;
    protected $fillable = array('nombre', 'direccion', 'telefono', 'user', 'arquidiocesis');
}
