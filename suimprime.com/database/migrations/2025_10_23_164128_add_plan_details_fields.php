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
            $table->string('duration_type')->nullable()->after('duration'); // week, month, year
            $table->integer('duration_value')->default(1)->after('duration_type'); // 1, 2, 3...
            $table->decimal('discount_percentage', 5, 2)->default(0)->after('discount');
            $table->text('description')->nullable()->after('discount_percentage');
            
            // Plan limits JSON fields
            $table->json('plan_limits')->nullable()->after('description');
            $table->json('download_options')->nullable()->after('plan_limits');
            $table->json('supported_device_types')->nullable()->after('download_options');
            $table->integer('device_limit_value')->default(0)->after('supported_device_types');
            $table->integer('profile_limit_value')->default(0)->after('device_limit_value');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn([
                'duration_type',
                'duration_value', 
                'discount_percentage',
                'description',
                'plan_limits',
                'download_options',
                'supported_device_types',
                'device_limit_value',
                'profile_limit_value'
            ]);
        });
    }
};