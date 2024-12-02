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
        Schema::create('movie_genres', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 255);
            $table->boolean('status')->default(false);
            $table->timestamps();
        });

        Schema::create('directors', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 255);
            $table->text('image');
            $table->date('birthday')->nullable();
            $table->string('national', 255)->nullable();
            $table->text('content')->nullable();
            $table->timestamps();
        });

        Schema::create('casts', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 255);
            $table->text('image');
            $table->date('birthday');
            $table->string('national', 255);
            $table->text('content')->nullable();
            $table->timestamps();
        });

        Schema::create('movies', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 255);
            $table->text('image');
            $table->integer('showTime');
            $table->date('releaseDate');
            $table->date('endDate');
            $table->string('national', 255);
            $table->text('description')->nullable();
            $table->text('trailer')->nullable();
            $table->bigInteger('rating_id')->unsigned();
            $table->foreign('rating_id')->references('id')->on('rating');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });

        Schema::create('moviegenres_movies', function (Blueprint $table) {
            $table->bigInteger('movie_id')->unsigned();
            $table->bigInteger('movieGenre_id')->unsigned();
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
            $table->foreign('movieGenre_id')->references('id')->on('movie_genres')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('casts_movies', function (Blueprint $table) {
            $table->bigInteger('movie_id')->unsigned();
            $table->bigInteger('cast_id')->unsigned();
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
            $table->foreign('cast_id')->references('id')->on('casts')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('directors_movies', function (Blueprint $table) {
            $table->bigInteger('movie_id')->unsigned();
            $table->bigInteger('director_id')->unsigned();
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
            $table->foreign('director_id')->references('id')->on('directors')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('audios', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 255);
            $table->timestamps();
        });

        Schema::create('subtitles', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 255);
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
        Schema::dropIfExists('movieGenres_movies');
        Schema::dropIfExists('movie_genres');
        Schema::dropIfExists('casts_movies');
        Schema::dropIfExists('directors_movies');
        Schema::dropIfExists('movies');
        Schema::dropIfExists('directors');
        Schema::dropIfExists('casts');
        Schema::dropIfExists('audios');
        Schema::dropIfExists('subtitles');
    }
};
