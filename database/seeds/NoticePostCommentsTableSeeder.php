<?php

use Illuminate\Database\Seeder;

class NoticePostCommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notice_post_comments')->insert([
            'body' => Str::random(20),
            'user_id' => 1,
            'notice_post_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
