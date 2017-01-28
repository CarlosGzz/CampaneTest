<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gaias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gaia',45);
            $table->timestamps();
        });

        // Llamada a egresos para establecer relacion con Staff
        Schema::table('staff', function(Blueprint $table){
            // Foreign keyes
            $table->foreign('gaia_id')->references('id')->on('gaias')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('gaias');
    }
}
