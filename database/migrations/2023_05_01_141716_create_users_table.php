<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('fullName', 255);
            $table->string('password', 255);
            $table->string('email', 255)->unique()->nullable();
            $table->string('phone', 20)->unique()->nullable();
            $table->boolean('status')->default(true);
            $table->bigInteger('code')->unique();
            $table->bigInteger('point');
            $table->bigInteger('theater_id')->unsigned()->nullable();
            $table->foreign('theater_id')->references('id')->on('theaters');
//            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('email_verified')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
