<?php

use Illuminate\Database\Seeder;

class NoticePostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notice_posts')->insert([
            'title' => Str::random(5),
            'body' => Str::random(20),
            'user_id' => 1,
            'notice_id' => 1,
        ]);
        
        DB::table('notice_posts')->insert([
            'title' => Str::random(5),
            'body' => Str::random(20),
            'user_id' => 1,
            'notice_id' => 1,
        ]);
    }
}
