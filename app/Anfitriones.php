<?php

namespace SIRVOTO;

use Illuminate\Database\Eloquent\Model;

class Anfitriones extends Model
{
    protected $table = 'anfitriones';
    protected $fillable = [
        'nombre',
        'paterno',
        'materno',
        'calle',
        'seccion',
        'manzana',
        'colonia',
        'celular',
        'email',
        'facebook',
        'identificacion'];
}
