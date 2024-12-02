<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theaters', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 255);
            $table->string('address', 255);
            $table->string('city', 255);
            $table->text('location')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
        Schema::create('roomtypes', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 255);
            $table->integer('surcharge')->default(0);
            $table->timestamps();
        });
        Schema::create('rooms', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 255);
            $table->bigInteger('roomType_id')->unsigned();
            $table->bigInteger('theater_id')->unsigned();
            $table->foreign('roomType_id')->references('id')->on('roomtypes');
            $table->foreign('theater_id')->references('id')->on('theaters');
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('rooms');
        Schema::dropIfExists('theaters');
        Schema::dropIfExists('roomTypes');
    }
};
