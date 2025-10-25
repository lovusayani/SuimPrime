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
        Schema::create('user_viewing_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('movie_id')->constrained()->onDelete('cascade');
            $table->integer('watch_time')->default(0); // in seconds
            $table->integer('total_duration')->nullable(); // total movie duration in seconds
            $table->decimal('progress_percentage', 5, 2)->default(0.00); // 0.00 to 100.00
            $table->timestamp('last_watched_at')->useCurrent();
            $table->boolean('completed')->default(false);
            $table->timestamps();
            
            // Unique constraint to prevent duplicate entries
            $table->unique(['user_id', 'movie_id']);
            
            // Indexes
            $table->index(['user_id', 'last_watched_at']);
            $table->index(['user_id', 'completed']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_viewing_history');
    }
};
