<?php

namespace Database\Seeders;

use App\Models\Canvas;
use App\Models\Pixel;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PixelSeeder extends Seeder
{
    /**
     * The Faker instance.
     *
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * Create a new seeder instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->faker = \Faker\Factory::create();
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = User::pluck('id')->toArray();
        $canvas = DB::table('canvases')->first();
        for ($x = 0; $x < $canvas->width; $x++) {
            for ($y = 0; $y < $canvas->height; $y++) {
                Pixel::factory()->create([
                    'x' => $x,
                    'y' => $y,
                    'color' => $this->faker->randomElement(['black',
                        'grey',
                        'white',
                        'red',
                        'orange',
                        'yellow',
                        'green',
                        'light blue',
                        'blue',
                        'purple',
                        'pink',
                        'brown',
                        'gold',
                        'silver']),

                    'canvas_id' => $canvas->id,
                    'user_id' =>  $this->faker->randomElement($users),
                ]);
            }
        }
    }
}
