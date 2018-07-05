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
            $table->integer('id_employed')->nullable();
            $table->tinyInteger('id_branch')->nullable();
            $table->string('code_lead')->nullable();
            $table->string('name_txt')->nullable();
            $table->string('name_lead')->nullable();
            $table->string('lastname_lead')->nullable();
            $table->timestamp('date_birth_lead')->nullable();
            $table->string('company')->nullable();
            $table->string('rfc')->nullable();
            $table->string('contact_lead')->nullable();
            $table->string('email_lead')->nullable();
            $table->string('phone_fix')->nullable();
            $table->string('phone_movil')->nullable();
            $table->text('adress_txt')->nullable();
            $table->text('obs_lead')->nullable();
            $table->tinyInteger('id_status')->nullable();//ver opciones
            $table->foreign('id_status')->references('id')->on('statusleads');
            $table->rememberToken();
            $table->tinyInteger('id_source')->nullable();
            $table->foreign('id_source')->references('id')->on('sourceleads');
            $table->integer('flag_owner')->default('0'); //0 para todos, y 1 sino buscar relaciones en tabla 
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
