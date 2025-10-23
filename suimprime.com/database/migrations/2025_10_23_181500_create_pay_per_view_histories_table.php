<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pay_per_view_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('content_type');
            $table->unsignedBigInteger('content_id');
            $table->string('duration')->nullable();
            $table->string('payment_method')->nullable();
            $table->dateTime('start_at');
            $table->dateTime('end_at')->nullable();
            $table->decimal('price', 10, 2)->default(0);
            $table->decimal('discount', 10, 2)->default(0);
            $table->decimal('total_amount', 10, 2)->default(0);
            $table->timestamps();

            $table->index(['content_type', 'content_id']);
            $table->index('start_at');
            $table->index('end_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pay_per_view_histories');
    }
};
