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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->bigInteger('schedule_id')->unsigned()->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->boolean('holdState')->default(false);
            $table->boolean('status')->default(false);
            $table->bigInteger('code')->unique();
            $table->boolean('hasPaid')->default(false);
            $table->boolean('receivedCombo')->default(false);
            $table->boolean('hasDiscount')->default(false);
            $table->bigInteger('totalPrice')->default(0);
            $table->foreign('schedule_id')->references('id')->on('schedules');
            $table->foreign('user_id')->references("id")->on('users');
            $table->timestamps();
        });

        Schema::create('ticketseats', function (Blueprint $table) {
            $table->string('row');
            $table->integer('col');
            $table->integer('price')->default(0);
            $table->bigInteger('ticket_id')->unsigned();
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');
            $table->String('seatType');
            $table->timestamps();
        });

        Schema::create('ticketcombos', function (Blueprint $table) {
            $table->string('comboName');
            $table->integer('comboPrice')->default(0);
            $table->string('comboDetails');
            $table->integer('quantity')->default(0);
            $table->bigInteger('ticket_id')->unsigned();
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('ticketfoods', function (Blueprint $table) {
            $table->string('foodName');
            $table->integer('foodPrice')->default(0);
            $table->integer('quantity')->default(0);
            $table->bigInteger('ticket_id')->unsigned();
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');
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
        Schema::dropIfExists('ticketseats');
        Schema::dropIfExists('ticketcombos');
        Schema::dropIfExists('ticketfoods');
        Schema::dropIfExists('tickets');

    }
};
