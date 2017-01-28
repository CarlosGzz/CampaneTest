<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuestas', function (Blueprint $table) {
            $table->increments('id');
            // Viviente
            $table->integer('viviente_id')->unsigned();
            //Cualidades 1
            $table->integer('reservado');
            $table->integer('sabiduria');
            $table->integer('idealista');
            $table->integer('explosivo');
            $table->integer('optimismo');
            //Cualidades 2
            $table->integer('prudencia');
            $table->integer('disciplina');
            $table->integer('pasion');
            $table->integer('hipersensibilidad');
            $table->integer('generosidad');
            //Cualidades 3
            $table->integer('handy');
            $table->integer('teson');
            $table->integer('elocuente');
            $table->integer('aventado');
            $table->integer('empatia');
            //Cualidades 4
            $table->integer('misterioso');
            $table->integer('fortaleza');
            $table->integer('improvisar');
            $table->integer('afable');
            $table->integer('lealtad');
            //Cualidades 5
            $table->integer('franco');
            $table->integer('sobreprotector');
            $table->integer('creativo');
            $table->integer('movido');
            $table->integer('triunfar');
            // EXTRA
            $table->string('personalidad',120);
            $table->string('mismo',400);
            $table->string('cualidades',200);
            $table->string('defectos',200);
            $table->string('fiesta',120);
            $table->timestamps();
            // LLave Foranea Viviente
            $table->foreign('viviente_id')->references('id')->on('vivientes')->onDelete('cascade')->onUpdate('cascade');
        
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
        Schema::dropIfExists('encuestas');
    }
}
