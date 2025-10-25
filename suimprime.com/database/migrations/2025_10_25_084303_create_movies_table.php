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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('poster_url')->nullable();
            $table->string('thumbnail_url')->nullable();
            $table->string('video_url')->nullable();
            $table->string('trailer_url')->nullable();
            $table->integer('duration')->nullable(); // in minutes
            $table->year('release_year')->nullable();
            $table->string('genre')->nullable();
            $table->string('language')->default('English');
            $table->string('rating')->nullable(); // PG, PG-13, R, etc.
            $table->decimal('imdb_rating', 3, 1)->nullable();
            $table->enum('type', ['movie', 'series', 'documentary'])->default('movie');
            $table->enum('status', ['active', 'inactive', 'coming_soon'])->default('active');
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_premium')->default(false);
            $table->json('cast')->nullable(); // Array of cast members
            $table->json('directors')->nullable(); // Array of directors
            $table->integer('view_count')->default(0);
            $table->timestamps();
            
            // Indexes
            $table->index(['status', 'type']);
            $table->index(['is_featured', 'status']);
            $table->index(['view_count']);
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
