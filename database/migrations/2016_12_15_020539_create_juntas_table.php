<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJuntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juntas', function (Blueprint $table) {
            $table->increments('id');
            // ID Campamento
            $table->integer('campamento_id')->unsigned();
            // Datos
            $table->string('nombre',140);
            $table->date('fecha');
            // Llaves Foraneas Campamento/Viviente
            $table->foreign('campamento_id')->references('id')->on('campamentos')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });

        /**
         * Tabla de relacion Staff/Juntas.
         *
         * @return void
         */
        Schema::create('staff_junta', function(Blueprint $table){
            $table->increments('id');
            // ID de Campamento/Viviente
            $table->integer('staff_id')->unsigned();
            $table->integer('junta_id')->unsigned();
            // Regla Unico 
            $table->unique(array('staff_id','junta_id'));
            $table->timestamps();

            // Llaves Foraneas Campamento/Viviente
            $table->foreign('staff_id')->references('id')->on('staff')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('junta_id')->references('id')->on('juntas')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('staff_junta');
        Schema::dropIfExists('juntas');
    }
}
