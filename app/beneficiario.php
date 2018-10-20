<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class beneficiario extends Model
{
    protected $table = 'beneficiarios';
    public $timestamps = true;
    protected $primaryKey = 'id_beneficiario';
    protected $fillable = array('documento', 'id_tipo_documento', 'nombre', 'apellido', 'estado', 'direccion', 'clasificacion', 'telefono');

    public function tipo_documento(){
        return $this->hasOne('App\tipo_documento', 'id', 'id_tipo_documento');
    }
}