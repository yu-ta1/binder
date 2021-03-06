<?php

use Illuminate\Database\Seeder;

class NoticesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notices')->insert([
            'team_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DB::table('notices')->insert([
            'team_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DB::table('notices')->insert([
            'team_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DB::table('notices')->insert([
            'team_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}