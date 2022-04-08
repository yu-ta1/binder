<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'body' => Str::random(20),
            'user_id' => 1,
            'post_id' => 1,
        ]);
        
        DB::table('comments')->insert([
            'body' => Str::random(20),
            'user_id' => 2,
            'post_id' => 1,
        ]);
    }
}
