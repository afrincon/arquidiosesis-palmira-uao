<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
    protected $table = 'users';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'password', 'estado');
}
