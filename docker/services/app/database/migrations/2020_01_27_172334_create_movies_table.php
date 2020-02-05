<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {        
            $table->string('Name');
            $table->string('belongs_to_collection');
            $table->integer('budget');
            $table->string('genres');
            $table->string('homepage');
            $table->integer('id');
            $table->string('imdb_id');
            $table->string('original_language');
            $table->string('original_title');
            $table->string('overview');
            $table->decimal('popularity');
            $table->string('poster_path');
            $table->string('production_companies');
            $table->string('production_countries');
            $table->string('release_date');
            $table->integer('revenue');
            $table->decimal('runtime');
            $table->string('spoken_languages');
            $table->string('status');
            $table->string('tagline');
            $table->string('title');
            $table->string('video');
            $table->decimal('vote_average');
            $table->integer('vote_count');
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}

