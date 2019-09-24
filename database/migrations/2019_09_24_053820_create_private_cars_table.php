<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('private_cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('car_name');
            $table->string('car_model');
            $table->text('car_description');
            $table->double('price');
            $table->integer('capacity');
            $table->string('fuel_type');
            $table->string('aircondition');
            $table->string('image');
            $table->string('billbook');
            $table->string('citizenship');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('private_cars');
    }
}
