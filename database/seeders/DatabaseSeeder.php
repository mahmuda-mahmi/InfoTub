<?php

namespace Database\Seeders;

use App\Models\Information;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $creator = User::factory()->create();

        Information::factory()
            ->count(3)
            ->published()
            ->for($creator)
            ->create();

        Information::factory()
            ->count(2)
            ->draft()
            ->for($creator)
            ->create();
    }
}
