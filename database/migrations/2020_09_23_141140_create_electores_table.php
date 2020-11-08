<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('electores', function (Blueprint $table) {
            $table->id();
            $table->string('seccion')->nullable();
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();
            $table->string('nombre')->nullable();
            $table->string('clave_elector')->nullable();
            $table->string('casilla')->nullable();
            $table->string('consecutivo_cas')->nullable();
            $table->string('calle')->nullable();
            $table->string('cp')->nullable();
            $table->string('colonia')->nullable();
            $table->string('dtto_fed')->nullable();
            $table->string('en_lista_nom')->nullable();
            $table->string('entidad')->nullable();
            $table->string('localidad')->nullable();
            $table->string('lugar_nac')->nullable();
            $table->string('manzana')->nullable();
            $table->string('municipio')->nullable();
            $table->string('num_emision')->nullable();
            $table->string('num_ext')->nullable();
            $table->string('num_int')->nullable();
            $table->string('ocupacion')->nullable();
            $table->string('dtt')->nullable();
            $table->string('sexo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('electores');
    }
}
