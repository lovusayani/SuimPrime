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
        Schema::create('user_watch_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('movie_id')->constrained()->onDelete('cascade');
            $table->integer('watch_duration')->default(0); // in seconds
            $table->integer('total_duration')->nullable(); // in seconds
            $table->decimal('progress_percentage', 5, 2)->default(0.00); // 0.00 to 100.00
            $table->timestamp('last_watched_at')->useCurrent();
            $table->boolean('completed')->default(false);
            $table->timestamps();
            
            // Indexes
            $table->index(['user_id', 'last_watched_at']);
            $table->index(['user_id', 'completed']);
            $table->unique(['user_id', 'movie_id']); // One record per user per movie
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_watch_history');
    }
};
