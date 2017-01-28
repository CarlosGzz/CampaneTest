 <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('id');
            // Datos Basicos
            $table->string('nombre',120);
            $table->string('apellidoPaterno',120);
            $table->string('apellidoMaterno',120);
            $table->string('genero',120);
            $table->date('fechaNacimiento');
            $table->string('carrera',120);
            $table->string('universidad',120);
            $table->enum('estudianteGraduado', array('estudiante', 'graduado'));
            // Datos de Campa
            $table->integer('gaia_id')->unsigned();
            $table->boolean('activo');
            $table->string('rolDeseado',200);
            $table->string('pulsera',20);
            $table->string('correo',120);
            $table->string('telefonoCel',120);
            $table->timestamps();
            $table->softDeletes();
        });

        /**
         * Tabla de relacion Campamento/Staff.
         *
         * @return void
         */
        Schema::create('campamento_staff', function(Blueprint $table){
            $table->increments('id');
            // ID de Campamento/Viviente
            $table->integer('campamento_id')->unsigned();
            $table->integer('staff_id')->unsigned();
            // Regla Unico 
            $table->unique(array('campamento_id','staff_id'));
            // Datos 
            $table->string('pagado',45)->nullable();
            $table->integer('puesto_id')->unsigned()->nullable();
            $table->integer('vehiculo_id')->unsigned()->nullable();
            $table->timestamps();

            // Llaves Foraneas Campamento/Viviente
            $table->foreign('campamento_id')->references('id')->on('campamentos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('staff_id')->references('id')->on('staff')->onUpdate('cascade')->onDelete('cascade');
        });

        /**
         * Llamada a egresos para establecer relacion con Viviente
         *
         * @return void
         */
        Schema::table('vivientes', function(Blueprint $table){
            // Foreign keyes
            $table->foreign('staff_id')->references('id')->on('staff')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('campamento_staff');
        Schema::dropIfExists('staff');
    }
}
