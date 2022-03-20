<?php

use Illuminate\Database\Seeder;

class FilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('files')->insert([
            'name' => Str::random(10),
            'user_id' => 1,
            'team_id' => 1,
        ]);
        
        DB::table('files')->insert([
            'name' => Str::random(10),
            'user_id' => 1,
            'team_id' => 1,
        ]);
        
        DB::table('files')->insert([
            'name' => Str::random(10),
            'user_id' => 1,
            'team_id' => 2,
        ]);
        
        DB::table('files')->insert([
            'name' => Str::random(10),
            'user_id' => 1,
            'team_id' => 3,
        ]);
        
        DB::table('files')->insert([
            'name' => Str::random(10),
            'user_id' => 2,
            'team_id' => 1,
        ]);
        
        DB::table('files')->insert([
            'name' => Str::random(10),
            'user_id' => 2,
            'team_id' => 1,
        ]);
        
        DB::table('files')->insert([
            'name' => Str::random(10),
            'user_id' => 3,
            'team_id' => 2,
        ]);
    }
}
