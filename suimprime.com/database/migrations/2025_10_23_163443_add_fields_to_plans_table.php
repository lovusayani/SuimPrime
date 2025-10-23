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
        Schema::table('plans', function (Blueprint $table) {
            $table->string('duration')->nullable()->after('name'); // e.g., "1 week", "1 month", "1 year"
            $table->tinyInteger('level')->default(1)->after('duration'); // Level 1-5
            $table->decimal('discount', 8, 2)->default(0)->after('price'); // Discount amount
            $table->boolean('status')->default(1)->after('discount'); // Active/Inactive
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn(['duration', 'level', 'discount', 'status']);
        });
    }
};