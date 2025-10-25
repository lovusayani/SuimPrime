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
        Schema::create('movie_pay_per_view', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movie_id')->constrained('movies')->onDelete('cascade');
            $table->decimal('price', 10, 2); // Price
            $table->enum('purchase_type', ['rental', 'onetime'])->default('rental'); // Purchase Type
            $table->integer('access_duration')->nullable(); // Access Duration (Days) - only for rental
            $table->decimal('discount', 5, 2)->nullable()->default(0); // Discount (%)
            $table->decimal('total_amount', 10, 2); // Total Price (calculated)
            $table->integer('available_for'); // Available For (Days)
            $table->boolean('status')->default(true); // Status
            $table->timestamps();
            
            // Add constraint: Available For must be greater than Access Duration
            $table->index(['movie_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_pay_per_view');
    }
};