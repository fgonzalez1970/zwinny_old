<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_lead');
            $table->foreign('id_lead')->references('id')->on('T01_leads');
            $table->integer('id_user');
            $table->foreign('id_user')->references('id')->on('crm_zwinny.users');
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
        Schema::dropIfExists('lead_users');
    }
}
