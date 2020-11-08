<?php

namespace SIRVOTO;

use Illuminate\Database\Eloquent\Model;

class Simpatizantes extends Model
{
    protected $table = 'simpatizantes';
    protected $fillable = [
        'nombre',
        'paterno',
        'materno',
        'calle',
        'colonia',
        'seccion',
        'manzana',
        'celular',
        'email',
        'facebook',
        'anfitrion_id',
        'identificacion',
        'user_id'];

        public function anfitriones()
        {
            return $this->belongsTo(Anfitriones::class, 'anfitrion_id');
        }

}


