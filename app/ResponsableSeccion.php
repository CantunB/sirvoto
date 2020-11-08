<?php

namespace SIRVOTO;

use Illuminate\Database\Eloquent\Model;

class ResponsableSeccion extends Model
{
    protected $table = 'responsable_secciones';
    protected $fillable = [
        'nombre',
        'paterno',
        'materno',
        'calle',
        'num_exterior',
        'seccion',
        'manzana',
        'colonia',
        'celular',
        'email',
        'facebook',
        'seccion_electoral',
        'tipo_seccion',
        'ubicacion_casilla',
        'user_id'];
}
