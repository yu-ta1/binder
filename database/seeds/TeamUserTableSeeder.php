<?php

use Illuminate\Database\Seeder;

class TeamUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('team_user')->insert([
            'user_id' => 1,
            'team_id' => 1,
            'role' => 'オーナー',
        ]);
        
        DB::table('team_user')->insert([
            'user_id' => 1,
            'team_id' => 2,
            'role' => 'オーナー',
        ]);
        
        DB::table('team_user')->insert([
            'user_id' => 1,
            'team_id' => 3,
            'role' => 'オーナー',
        ]);
        
        DB::table('team_user')->insert([
            'user_id' => 2,
            'team_id' => 1,
            'role' => 'メンバー',
        ]);
        
        DB::table('team_user')->insert([
            'user_id' => 2,
            'team_id' => 2,
            'role' => 'メンバー',
        ]);
        
        DB::table('team_user')->insert([
            'user_id' => 3,
            'team_id' => 1,
            'role' => 'メンバー',
        ]);
        
    }
}
