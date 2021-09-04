<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Category::factory(6)->create();
        $this->call(VideoSeeder::class);
    }
}
