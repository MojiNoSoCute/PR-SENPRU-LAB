<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\AdminUserSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Only create test user if it doesn't exist
        if (!User::where('email', 'test@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
        }

        // create admin user
        $this->call(AdminUserSeeder::class);
        $this->call(ProgramSeeder::class);
        
        // Seed additional data
        $this->call(ActivitySeeder::class);
        $this->call(FacultyMemberSeeder::class);
        $this->call(CareerOpportunitySeeder::class);
        $this->call(LaboratorySeeder::class);
        $this->call(StudentWorkSeeder::class);
        $this->call(AlumnusSeeder::class);
        $this->call(VideoSeeder::class);
        $this->call(FacultyResearchSeeder::class);
    }
}
