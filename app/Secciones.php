<?php

namespace SIRVOTO;

use Illuminate\Database\Eloquent\Model;

class Secciones extends Model
{
    protected $table = 'secciones';
    protected $fillable = [
        'name',
        'address',
        'lat',
        'lng',
        'type',
        ];
}
