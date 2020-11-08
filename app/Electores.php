<?php

namespace SIRVOTO;

use Illuminate\Database\Eloquent\Model;

class Electores extends Model
{
    protected $table = 'lns';

    public function scopeNombre($query, $nombre)
    {
        if ($nombre)

            return $query->where('nombre','LIKE',"%$nombre%");
    }

    public function scopePaterno($query, $paterno)
    {
        if ($paterno)
            return $query->where('apellido_paterno','LIKE',"%$paterno%");
    }

    public function scopeMaterno($query, $materno)
    {
        if($materno )
            return $query->where('apellido_materno','LIKE',"%$materno%");
    }

    public static function getSec_Man($seccion){
        return  Electores::select('manzana')
                  ->where('seccion', $seccion)
                  ->groupBy('manzana')
                  ->orderBy('manzana','DESC')
                  ->get();
      }

    public static function getManzanas($seccion){
      return  Electores::select('manzana')
                ->where('seccion', $seccion)
                ->groupBy('manzana')
                ->orderBy('manzana','DESC')
                ->get();
    }

}
