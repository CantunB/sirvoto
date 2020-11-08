<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lns', function (Blueprint $table) {
            $table->id();
            $table->string('clave_elector');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('nombre');
            $table->string('año_nac');
            $table->string('edad');
            $table->string('sexo');
            $table->string('calle');
            $table->string('num_exterior');
            $table->string('num_interior');
            $table->string('colonia');
            $table->string('cp');
            $table->string('municipio');
            $table->string('seccion');
            $table->string('manzana');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lns');
    }
}
