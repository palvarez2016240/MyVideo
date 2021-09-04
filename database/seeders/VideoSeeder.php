<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $videos = Video::factory(50)->create();

        foreach ($videos as $video) {

            $video->categories()->attach([rand(1, 3), rand(4, 6)]);
        }
    }
}
