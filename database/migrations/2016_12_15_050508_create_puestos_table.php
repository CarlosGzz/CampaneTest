<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puestos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('puesto',100);
            $table->timestamps();
        });


        // Llamada a egresos para establecer relacion con puesto
        Schema::table('campamento_staff', function(Blueprint $table){
            // Foreign keyes
            $table->foreign('puesto_id')->references('id')->on('puestos')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('puestos');
    }
}
