<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    protected $table = "continents";
    //establecer la clave primaria de esa tabla
    protected $primaryKey = "continent_id";
    //omitir campos de auditoria
    public $timestamps = false;

    use HasFactory;

    //relacion entre continente y region
    public function regiones(){
        //hasMany parametros
        //1. El modelo a relacionar
        //2. La clave foranea (FK) del modelo actual en el modelo a relacionar 
        return $this ->hasMany(Region::class ,
                                'continent_id');
    }

    //relacion entre contienente y sus paises
    //Abuelo= continent
    //Papá= region
    //Nieto = Country
    public function paises(){
        //hasManyThrough : Parametros
        //1. Modelo nieto
        //2. Modelo Papa
        //3. Clave foranea (fk) del abuelo en el papa
        //4. Clave foranea (fk) en el nieto
        return $this->hasManyThrough(Country::class ,
                                     Region::class ,
                                    'continent_id' ,
                                    'region_id');
    }
}
