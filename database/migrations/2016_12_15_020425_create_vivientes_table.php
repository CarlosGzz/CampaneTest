<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVivientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vivientes', function (Blueprint $table) {
            $table->increments('id');

            // Datos Generales
            $table->enum('genero',['M','F']);
            $table->string('nombre',120);
            $table->string('apellidoPaterno',120);
            $table->string('apellidoMaterno',120);
            $table->date('fechaNacimiento');
            $table->string('telefonoCasa',120);
            $table->string('telefonoCel',120);
            $table->string('correo',200);
            $table->string('observaciones',400)->nullable();
            $table->string('restriccionesAlimentarias',60)->nullable();
            $table->string('alergias',120)->nullable();
            $table->string('medioCampamento',120)->nullable();
            // Staff 
            $table->integer('staff_id')->nullable()->unsigned();
            $table->string('otro',120)->nullable();
            // Campamento
            $table->integer('campamento_id')->unsigned();
            $table->integer('pagado')->nullable();
            $table->integer('gaia_id')->unsigned()->nullable();
            $table->integer('cartaSeguro')->nullable();
            $table->integer('cartaDeslinde')->nullable();

            // Llave foranea de campamento
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
        Schema::dropIfExists('vivientes');
    }
}
