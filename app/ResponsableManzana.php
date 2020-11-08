<?php

namespace SIRVOTO;

use Illuminate\Database\Eloquent\Model;

class ResponsableManzana extends Model
{
    protected $table = 'responsable_manzanas';
    protected $fillable = [
        'nombre',
        'paterno',
        'materno',
        'calle',
        'num_exterior',
        'colonia',
        'seccion',
        'manzana',
        'celular',
        'email',
        'facebook',
        'seccion_electoral',
        'manzanas',
        'user_id'];
}
