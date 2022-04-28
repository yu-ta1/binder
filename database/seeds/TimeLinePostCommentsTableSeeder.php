<?php

use Illuminate\Database\Seeder;

class TimeLinePostCommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('time_line_post_comments')->insert([
            'body' => Str::random(20),
            'user_id' => 1,
            'time_line_post_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DB::table('time_line_post_comments')->insert([
            'body' => Str::random(20),
            'user_id' => 2,
            'time_line_post_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}