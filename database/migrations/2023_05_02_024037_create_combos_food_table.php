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
        Schema::create('combos', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 255);
            $table->text('image');
            $table->integer('price');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
        Schema::create('foods', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 255);
            $table->text('image');
            $table->integer('price');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });

        Schema::create('combo_details', function (Blueprint $table) {
            $table->bigInteger('combo_id')->unsigned();
            $table->bigInteger('food_id')->unsigned();
            $table->foreign('combo_id')->references('id')->on('combos')->onDelete('cascade');
            $table->foreign('food_id')->references('id')->on('foods');
            $table->integer('quantity')->default(0);
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
        Schema::dropIfExists('combo_details');
        Schema::dropIfExists('combos');
        Schema::dropIfExists('foods');
    }
};
