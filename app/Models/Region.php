<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = "regions";
    //establecer la clave primaria de esa tabla
    protected $primaryKey = "region_id";
    //omitir campos de auditoria
    public $timestamps = false;
    use HasFactory;

    //relacion entre regiones y continente
    public function continente(){
        //belongsTo parametros
        //1. Modelo relacional
        //2. la clave foranea (fk) del modelo relacional en el modelo actual
        return $this->belongsTo( Continent::class,
                                'continent_id');
    }

    //relacion entre region 1 - M paises
    public function paises(){
        //
        return $this->hasMany(Country::class,
                                'region_id');
    }
}
