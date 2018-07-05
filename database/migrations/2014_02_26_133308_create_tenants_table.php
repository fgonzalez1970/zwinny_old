<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('contact')->nullable();
            $table->string('name_bd')->nullable();
            $table->integer('num_users')->nullable();
            $table->string('num_contract')->nullable();
            $table->string('logo_file')->nullable();
            $table->string('logo_txt')->nullable();
            $table->integer('id_status')->unsigned()->default(1);
            $table->foreign('id_status')->references('id')->on('statustenants');
            $table->timestamp('date_start')->nullable();
            $table->timestamp('date_end')->nullable();   
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
        Schema::dropIfExists('tenants');
    }
}
