<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresos', function (Blueprint $table) {
            $table->increments('id');
            // ID Campamento
            $table->integer('campamento_id')->unsigned();
            // Datos
            $table->date('fecha');
            $table->integer('idStaffViviente');
            $table->string('metodoDePago',45);
            $table->double('monto');
            $table->string('comentarios',400);
            // Llaves Foraneas Campamento/Viviente
            $table->foreign('campamento_id')->references('id')->on('campamentos')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('ingresos');
    }
}
