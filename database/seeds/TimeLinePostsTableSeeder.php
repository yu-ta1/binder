<?php

use Illuminate\Database\Seeder;

class TimeLinePostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('time_line_posts')->insert([
            'title' => Str::random(5),
            'body' => Str::random(20),
            'user_id' => 1,
            'time_line_id' => 1,
        ]);
        
        DB::table('time_line_posts')->insert([
            'title' => Str::random(5),
            'body' => Str::random(20),
            'user_id' => 1,
            'time_line_id' => 1,
        ]);
        
        DB::table('time_line_posts')->insert([
            'title' => Str::random(5),
            'body' => Str::random(20),
            'user_id' => 1,
            'time_line_id' => 1,
        ]);
        
        DB::table('time_line_posts')->insert([
            'title' => Str::random(5),
            'body' => Str::random(20),
            'user_id' => 2,
            'time_line_id' => 1,
        ]);
        
        DB::table('time_line_posts')->insert([
            'title' => Str::random(5),
            'body' => Str::random(20),
            'user_id' => 2,
            'time_line_id' => 1,
        ]);
    }
}
