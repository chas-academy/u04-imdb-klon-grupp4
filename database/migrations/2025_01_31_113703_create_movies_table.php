<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void // Create the 'movies' table
    {
        Schema::create('movies', function (Blueprint $table) {      // Primary key
            $table->id();                                            //table id
            $table->string('title');                                 //movie title
            $table->integer('release_year');                        //year the movie was released
            $table->unsignedBigInteger('rating_id');              //foreign key to the 'rating' table
            $table->text('plot')->nullable();                    // Plot summary of the movie (nullable)
            $table->integer('movie_length');                       // Length of the movie in minutes
            $table->timestamps();                                // Timestamps for created_at and updated_at

            // Define Foreign key constraint
            $table->foreign('rating_id')->references('id')->on('ratings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
