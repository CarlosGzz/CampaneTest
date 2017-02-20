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
            $table->enum('staffVivienteOtro', ['staff', 'viviente', 'otro']);
            $table->integer('staff_id')->unsigned()->nullable();
            $table->integer('viviente_id')->unsigned()->nullable();
            $table->string('otro',255)->nullable();
            $table->string('metodoDePago',45);
            $table->double('monto');
            $table->string('comentarios',400)->nullable();
            // Llaves Foraneas Campamento/Viviente
            $table->foreign('campamento_id')->references('id')->on('campamentos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('staff_id')->references('id')->on('staff')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('viviente_id')->references('id')->on('vivientes')->onUpdate('cascade')->onDelete('cascade');
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
