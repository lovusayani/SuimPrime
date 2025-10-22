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
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('currency_name');
            $table->string('currency_symbol', 10);
            $table->string('currency_code', 10);
            $table->boolean('is_primary')->default(false);
            $table->string('currency_position')->default('left');
            $table->string('thousand_separator', 5)->default(',');
            $table->string('decimal_separator', 5)->default('.');
            $table->integer('no_of_decimal')->default(2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
