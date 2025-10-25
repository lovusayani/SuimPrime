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
        Schema::table('movies', function (Blueprint $table) {
            // Add missing fields that are used in the form but not in current table
            if (!Schema::hasColumn('movies', 'language')) {
                $table->string('language')->nullable()->after('release_date');
            }
            if (!Schema::hasColumn('movies', 'content_rating')) {
                $table->string('content_rating')->nullable()->after('language');
            }
            if (!Schema::hasColumn('movies', 'IMDb_rating')) {
                $table->decimal('IMDb_rating', 3, 1)->nullable()->after('content_rating');
            }
            if (!Schema::hasColumn('movies', 'duration')) {
                $table->string('duration')->nullable()->after('IMDb_rating');
            }
            if (!Schema::hasColumn('movies', 'is_restricted')) {
                $table->boolean('is_restricted')->default(false)->after('duration');
            }
            
            // SEO fields
            if (!Schema::hasColumn('movies', 'meta_title')) {
                $table->string('meta_title')->nullable()->after('plan_id');
            }
            if (!Schema::hasColumn('movies', 'meta_keywords')) {
                $table->text('meta_keywords')->nullable()->after('meta_title');
            }
            if (!Schema::hasColumn('movies', 'meta_description')) {
                $table->text('meta_description')->nullable()->after('meta_keywords');
            }
            if (!Schema::hasColumn('movies', 'google_site_verification')) {
                $table->string('google_site_verification')->nullable()->after('meta_description');
            }
            if (!Schema::hasColumn('movies', 'canonical_url')) {
                $table->string('canonical_url')->nullable()->after('google_site_verification');
            }
            if (!Schema::hasColumn('movies', 'seo_image')) {
                $table->string('seo_image')->nullable()->after('canonical_url');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->dropColumn([
                'language', 'content_rating', 'IMDb_rating', 'duration', 'is_restricted',
                'meta_title', 'meta_keywords', 'meta_description', 'google_site_verification',
                'canonical_url', 'seo_image'
            ]);
        });
    }
};
