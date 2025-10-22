<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tmdb_data', function (Blueprint $table) {
            $table->id();
            $table->integer('tmdb_id')->unique();
            $table->string('title');
            $table->text('overview')->nullable();
            $table->string('poster_path')->nullable();
            $table->string('backdrop_path')->nullable();
            $table->date('release_date')->nullable();
            $table->string('original_language')->nullable();
            $table->decimal('vote_average', 3, 1)->default(0);
            $table->integer('vote_count')->default(0);
            $table->integer('runtime')->nullable();
            $table->json('genres')->nullable();
            $table->json('production_countries')->nullable();
            $table->string('status')->nullable();
            $table->decimal('budget', 15, 2)->nullable();
            $table->decimal('revenue', 15, 2)->nullable();
            $table->string('imdb_id')->nullable();
            $table->text('tagline')->nullable();
            $table->integer('popularity')->nullable();
            $table->boolean('adult')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tmdb_data');
    }
};