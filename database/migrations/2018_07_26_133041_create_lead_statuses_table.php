<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->increments('id_lead');
            $table->foreign('id_lead')->references('id')->on('T01_leads');
            $table->increments('id_status');
            $table->foreign('id_lead')->references('id')->on('T01m10_statuleads');
            $table->timestamp('date_change');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lead_statuses');
    }
}
