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
            'id' => 1,
            'name' => Str::random(10),
            'user_id' => 1,
            'team_id' => 1,
        ]);
        
        DB::table('files')->insert([
            'id' => 2,
            'name' => Str::random(10),
            'user_id' => 1,
            'team_id' => 1,
        ]);
        
        DB::table('files')->insert([
            'id' => 3,
            'name' => Str::random(10),
            'user_id' => 1,
            'team_id' => 2,
        ]);
        
        DB::table('files')->insert([
            'id' => 4,
            'name' => Str::random(10),
            'user_id' => 1,
            'team_id' => 3,
        ]);
        
        
    }
}
