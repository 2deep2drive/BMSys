<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Ratings')->insert([
            [
                'user_id' => 6,
                'post_id' => 1,
                'like' => 0,
                'dislike' => 0,
                'isClicked' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 6,
                'post_id' => 2,
                'like' => 0,
                'dislike' => 0,
                'isClicked' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 6,
                'post_id' => 3,
                'like' => 0,
                'dislike' => 0,
                'isClicked' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'user_id' => 7,
                'post_id' => 4,
                'like' => 0,
                'dislike' => 0,
                'isClicked' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 7,
                'post_id' => 5,
                'like' => 0,
                'dislike' => 0,
                'isClicked' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 7,
                'post_id' => 6,
                'like' => 0,
                'dislike' => 0,
                'isClicked' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'user_id' => 8,
                'post_id' => 7,
                'like' => 0,
                'dislike' => 0,
                'isClicked' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 8,
                'post_id' => 8,
                'like' => 0,
                'dislike' => 0,
                'isClicked' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'user_id' => 9,
                'post_id' => 9,
                'like' => 0,
                'dislike' => 0,
                'isClicked' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
          
            [
                'user_id' => 10,
                'post_id' => 10,
                'like' => 0,
                'dislike' => 0,
                'isClicked' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

        ]);


        for ($i = 11; $i <= 60; $i++) {
            $postData[] = [
                'user_id' => $i,
                'post_id' => $i,
                'like' => 0,
                'dislike' => 0,
                'isClicked' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ];
        }

        foreach ($postData as $Data) {
            DB::table('Ratings')->insert($Data);
        }
    }
}
