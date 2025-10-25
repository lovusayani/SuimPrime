<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Fix movie_posters_tv table - convert absolute URLs to relative paths
        DB::table('movie_posters_tv')->get()->each(function ($row) {
            $updated = [];
            
            // Fix thumbnail
            if ($row->thumbnail) {
                $updated['thumbnail'] = $this->convertToRelativePath($row->thumbnail);
            }
            
            // Fix poster
            if ($row->poster) {
                $updated['poster'] = $this->convertToRelativePath($row->poster);
            }
            
            // Fix poster_tv
            if ($row->poster_tv) {
                $updated['poster_tv'] = $this->convertToRelativePath($row->poster_tv);
            }
            
            if (!empty($updated)) {
                DB::table('movie_posters_tv')->where('id', $row->id)->update($updated);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // This migration cannot be easily reversed as we lose domain information
        // But that's okay since relative paths are more flexible
    }
    
    /**
     * Convert absolute URL to relative path
     */
    private function convertToRelativePath($url)
    {
        if (empty($url)) {
            return $url;
        }
        
        // If it's already a relative path, return as is
        if (!str_starts_with($url, 'http://') && !str_starts_with($url, 'https://')) {
            return $url;
        }
        
        // Parse the URL and extract the path
        $parsedUrl = parse_url($url);
        $path = $parsedUrl['path'] ?? '';
        
        // Return the path part (e.g., /storage/media/filename.jpg)
        return $path;
    }
};
