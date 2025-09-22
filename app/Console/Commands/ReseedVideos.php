<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Video;

class ReseedVideos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reseed-videos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear and reseed videos with updated URLs';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Clear existing videos
        Video::truncate();
        
        // Run the seeder
        $this->call('db:seed', ['--class' => 'VideoSeeder']);
        
        $this->info('Videos have been cleared and reseeded successfully!');
    }
}
