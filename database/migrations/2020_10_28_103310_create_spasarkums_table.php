<?php

use  Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpasarkumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spasarkums', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_company');
            $table->string('name');
            $table->string('activity');
            $table->text('work_day_time');
            $table->integer('phone_number');
            $table->string('email');
            $table->string('site');
            $table->string('adress');
            $table->string('number_adress');
            $table->string('partner');

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
        Schema::dropIfExists('spasarkums');
    }
}
