<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_entity');
            $table->integer('id_condicion_pago')->nullable();
            $table->integer('id_empleado')->nullable();
            $table->tinyInteger('id_giro')->nullable();
            $table->string('codigo_lead')->nullable();
            $table->string('nombre_lead')->nullable();
            $table->string('apellido_lead')->nullable();
            $table->timestamp('fecha_nac_lead')->nullable();
            $table->string('razon_social')->nullable();
            $table->string('rfc')->nullable();
            $table->string('contacto_lead')->nullable();
            $table->string('email')->nullable();
            $table->string('obs_lead')->nullable();
            $table->tinyInteger('id_status')->nullable();//ver opciones
            $table->timestamp('fecha_alta_lead')->nullable();
            $table->timestamp('fecha_baja_lead')->nullable();
            $table->timestamps();
        });
    }
            //Id_Nivel_Precio tinyint **** preguntar ???

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
}
