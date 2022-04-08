<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => Str::random(5),
            'body' => Str::random(20),
            'user_id' => 1,
            'file_id' => 1,
        ]);
        
        DB::table('posts')->insert([
            'title' => Str::random(5),
            'body' => Str::random(20),
            'user_id' => 1,
            'file_id' => 1,
        ]);
        
        DB::table('posts')->insert([
            'title' => Str::random(5),
            'body' => Str::random(20),
            'user_id' => 2,
            'file_id' => 1,
        ]);
        
        DB::table('posts')->insert([
            'title' => Str::random(5),
            'body' => Str::random(20),
            'user_id' => 1,
            'file_id' => 2,
        ]);
        
        DB::table('posts')->insert([
            'title' => Str::random(5),
            'body' => Str::random(20),
            'user_id' => 2,
            'file_id' => 2,
        ]);
    }
}
