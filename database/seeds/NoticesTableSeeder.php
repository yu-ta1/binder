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
        ]);
        
        DB::table('notices')->insert([
            'team_id' => 2,
        ]);
        
        DB::table('notices')->insert([
            'team_id' => 3,
        ]);
        
        DB::table('notices')->insert([
            'team_id' => 4,
        ]);
    }
}