<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->increments('id');
            // ID de Viviente
            $table->integer('staff_id')->unsigned();
            // Datos
            $table->string('modelo',45);
            $table->time('horaSalida');
            $table->string('puntoPartida',100);
            $table->integer('numeroCajas');
            $table->integer('numeroPersonas');
            $table->timestamps();
        });

        // Llamada a egresos para establecer relacion con Viviente
        Schema::table('campamento_staff', function(Blueprint $table){
            // Foreign keyes
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('vehiculos');
    }
}
