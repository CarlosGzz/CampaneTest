<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamiliarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('familiares', function (Blueprint $table) {
            $table->increments('id');
            // Viviente
            $table->integer('viviente_id')->unsigned();
            // Tipo Familiar
            $table->enum('tipoFamiliar', ['Padre', 'Madre', 'Amigo1', 'Amigo2', 'Amigo3']);
            // Datos de Familiar
            $table->string('nombre',250);
            $table->string('telefono',120);
            $table->string('celular',120);
            $table->string('correo',200);
            $table->integer('esViviente')->nullable();
            // LLave Foranea Viviente
            $table->foreign('viviente_id')->references('id')->on('vivientes')->onDelete('cascade')->onUpdate('cascade');
        
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
        Schema::dropIfExists('familiares');
    }
}
