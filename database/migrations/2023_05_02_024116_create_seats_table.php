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
        Schema::create('seattypes', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name');
            $table->integer('surcharge')->default(0);
            $table->string('color');
            $table->timestamps();
        });

        Schema::create('seats', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('row', 255);
            $table->integer('col');
            $table->integer('ms')->default(0);
            $table->integer('me')->default(0);
            $table->integer('mb')->default(0);
            $table->bigInteger('seatType_id')->unsigned();
            $table->bigInteger('room_id')->unsigned();
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->foreign('seatType_id')->references('id')->on('seattypes');
            $table->string('status')->default(true);
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
        Schema::dropIfExists('seats');
        Schema::dropIfExists('seattypes');

    }
};
