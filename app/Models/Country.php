<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = "countries";
    //establecer la clave primaria de esa tabla
    protected $primaryKey = "country_id";
    //omitir campos de auditoria
    public $timestamps = false;
    use HasFactory;

    //relacion M:M entre paises e idiomas
    public function idiomas(){
        //belongsToMany : para relaciones M:M 
        //1.Modelo a relacionar
        //2.Tabla pivote
        //3.Clave foranea(fk) en el pivote
        return $this->belongsToMany(idioma::class , 
                                    'country_languages' ,
                                    'country_id' ,
                                    'language_id'
                                    )->withPivot('official');
    }

    public function region(){
        return $this->belongsTo(Region::class , 'region_id');
    }

}
