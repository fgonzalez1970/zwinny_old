<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name')->nullable();
            $table->string('lastname')->nullable();
            $table->timestamp('birth_date')->nullable();
            $table->string('avatar_photo')->nullable();
            $table->integer('id_gender')->nullable();
            $table->foreign('id_gender')->references('id')->on('genders');
            $table->integer('id_civil_status')->nullable();
            $table->foreign('id_civil_status')->references('id')->on('civil_statuses');
            $table->string('phone_fix')->nullable();
            $table->string('phone_movil')->nullable();
            $table->string('email_sec')->nullable();
            $table->string('skype_id')->nullable();
            $table->text('adress')->nullable();//ver opciones
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
        Schema::dropIfExists('profiles');
    }
}
