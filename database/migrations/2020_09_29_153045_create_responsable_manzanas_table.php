<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsableManzanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsable_manzanas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('paterno');
            $table->string('materno');
            $table->string('calle');
            $table->string('num_exterior')->default('S/N')->nullable();
            $table->string('colonia');
            $table->string('seccion')->nullable();
            $table->string('manzana')->nullable();
            $table->string('celular')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('seccion_electoral');
            $table->text('manzanas');
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responsable_manzanas');
    }
}
