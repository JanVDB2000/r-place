<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Pixel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(500)->create();

         \App\Models\User::factory()->create([
             'name' => 'Time_men',
             'email' => 'test@example.com',
         ]);
        $this->call([
            CanvasSeeder::class,
            PixelSeeder::class,
        ]);
    }
}
