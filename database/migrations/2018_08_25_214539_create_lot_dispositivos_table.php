<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotDispositivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lot_dispositivos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('id_kontaktTag')->nullable();
            $table->string('UUID')->nullable();
            $table->integer('id_tipo')->nullable();
            //$table->foreign('id_tipo')->references('id')->on('lot_tipo_dispositivos');
            $table->integer('id_subtipo')->nullable();
            //$table->foreign('id_subtipo')->references('id')->on('lot_subtipo_dispositivos');
            $table->timestamp('date_up')->nullable();
            $table->timestamp('date_down')->nullable();   
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
        Schema::dropIfExists('lot_dispositivos');
    }
}
