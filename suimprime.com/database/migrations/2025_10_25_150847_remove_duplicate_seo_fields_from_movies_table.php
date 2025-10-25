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
            // Remove duplicate SEO fields that exist in movie_seo_settings table
            if (Schema::hasColumn('movies', 'meta_title')) {
                $table->dropColumn('meta_title');
            }
            if (Schema::hasColumn('movies', 'meta_keywords')) {
                $table->dropColumn('meta_keywords');
            }
            if (Schema::hasColumn('movies', 'meta_description')) {
                $table->dropColumn('meta_description');
            }
            if (Schema::hasColumn('movies', 'google_site_verification')) {
                $table->dropColumn('google_site_verification');
            }
            if (Schema::hasColumn('movies', 'canonical_url')) {
                $table->dropColumn('canonical_url');
            }
            if (Schema::hasColumn('movies', 'seo_image')) {
                $table->dropColumn('seo_image');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movies', function (Blueprint $table) {
            // Re-add the fields in case we need to rollback
            $table->string('meta_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('google_site_verification')->nullable();
            $table->string('canonical_url')->nullable();
            $table->string('seo_image')->nullable();
        });
    }
};
