<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotDispositivosTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lot_dispositivos_tenants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_dispositivo');
            //$table->foreign('id_dispositivo')->references('id')->on('lot_dispositivos');
            $table->integer('id_tenant');
            //$table->foreign('id_tenant')->references('id')->on('tenants');
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
        Schema::dropIfExists('lot_dispositivos_tenants');
    }
}
