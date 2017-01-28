<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePalancasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('palancas', function (Blueprint $table) {
            $table->increments('id');
            // Viviente
            $table->integer('viviente_id')->unsigned();
            // Familiar
            $table->integer('familiar_id')->unsigned();
            //Palanca
            $table->integer('palancaRecibida');
            $table->string('observaciones',200);
            // LLave Foranea Viviente/Familiar
            $table->foreign('viviente_id')->references('id')->on('vivientes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('familiar_id')->references('id')->on('familiares')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('palancas');
    }
}
