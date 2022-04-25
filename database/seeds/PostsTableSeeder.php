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
            'id' => 1,
            'title' => Str::random(5),
            'body' => Str::random(20),
            'user_id' => 1,
            'file_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DB::table('posts')->insert([
            'id' => 2,
            'title' => Str::random(5),
            'body' => Str::random(20),
            'user_id' => 1,
            'file_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DB::table('posts')->insert([
            'id' => 3,
            'title' => Str::random(5),
            'body' => Str::random(20),
            'user_id' => 2,
            'file_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DB::table('posts')->insert([
            'id' => 4,
            'title' => Str::random(5),
            'body' => Str::random(20),
            'user_id' => 1,
            'file_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DB::table('posts')->insert([
            'id' => 5,
            'title' => Str::random(5),
            'body' => Str::random(20),
            'user_id' => 2,
            'file_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
