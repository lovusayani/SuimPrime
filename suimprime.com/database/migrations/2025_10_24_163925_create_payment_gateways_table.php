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
        Schema::create('payment_gateways', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // cashfree, razorpay, stripe, paypal
            $table->string('display_name'); // Display name for frontend
            $table->boolean('is_active')->default(true);
            $table->boolean('is_sandbox')->default(true);
            $table->json('credentials'); // Store encrypted API keys
            $table->json('config')->nullable(); // Additional configuration
            $table->string('webhook_url')->nullable();
            $table->timestamps();
            
            $table->unique('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_gateways');
    }
};
