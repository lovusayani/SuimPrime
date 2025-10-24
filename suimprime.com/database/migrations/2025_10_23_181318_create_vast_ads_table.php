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
        Schema::create('vast_ads', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->enum('type', ['pre-roll', 'mid-roll', 'post-roll', 'overlay']);
            $table->text('url');
            $table->enum('target_type', ['video', 'movie', 'tvshow']);
            $table->json('target_selection')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vast_ads');
    }
};