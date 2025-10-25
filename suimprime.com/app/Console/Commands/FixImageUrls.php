<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FixImageUrls extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fix:image-urls';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix absolute image URLs to relative paths for cross-environment compatibility';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting to fix image URLs...');
        
        $rows = DB::table('movie_posters_tv')->get();
        $updated = 0;
        
        foreach ($rows as $row) {
            $changes = [];
            
            // Fix thumbnail
            if ($row->thumbnail && (str_starts_with($row->thumbnail, 'http://') || str_starts_with($row->thumbnail, 'https://'))) {
                $path = parse_url($row->thumbnail, PHP_URL_PATH);
                if ($path) {
                    $changes['thumbnail'] = $path;
                }
            }
            
            // Fix poster
            if ($row->poster && (str_starts_with($row->poster, 'http://') || str_starts_with($row->poster, 'https://'))) {
                $path = parse_url($row->poster, PHP_URL_PATH);
                if ($path) {
                    $changes['poster'] = $path;
                }
            }
            
            // Fix poster_tv
            if ($row->poster_tv && (str_starts_with($row->poster_tv, 'http://') || str_starts_with($row->poster_tv, 'https://'))) {
                $path = parse_url($row->poster_tv, PHP_URL_PATH);
                if ($path) {
                    $changes['poster_tv'] = $path;
                }
            }
            
            if (!empty($changes)) {
                DB::table('movie_posters_tv')->where('id', $row->id)->update($changes);
                $updated++;
                $this->line("Updated row {$row->id}: " . json_encode($changes));
            }
        }
        
        $this->info("Fixed {$updated} image URLs total.");
        return 0;
    }
}
