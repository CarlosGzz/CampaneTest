<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEgresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('egresos', function (Blueprint $table) {
            $table->increments('id');
            // ID Campamento
            $table->integer('campamento_id')->unsigned();
            // Datos
            $table->date('fecha');
            $table->integer('area_id')->unsigned();
            $table->integer('staff_id')->unsigned()->nullable();
            $table->string('descripcion',200);
            $table->double('monto');
            // Llaves Foraneas Campamento/Viviente
            $table->foreign('campamento_id')->references('id')->on('campamentos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('staff_id')->references('id')->on('staff')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('area_id')->references('id')->on('areas')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('egresos');
    }
}
