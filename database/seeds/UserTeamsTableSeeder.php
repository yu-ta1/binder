<?php

use Illuminate\Database\Seeder;

class UserTeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_teams')->insert([
            'user_id' => 1,
            'team_id' => 1,
        ]);
        
        DB::table('user_teams')->insert([
            'user_id' => 1,
            'team_id' => 2,
        ]);
        
        DB::table('user_teams')->insert([
            'user_id' => 1,
            'team_id' => 3,
        ]);
        
        DB::table('user_teams')->insert([
            'user_id' => 2,
            'team_id' => 1,
        ]);
        
        DB::table('user_teams')->insert([
            'user_id' => 2,
            'team_id' => 2,
        ]);
        
        DB::table('user_teams')->insert([
            'user_id' => 3,
            'team_id' => 1,
        ]);
        
        DB::table('user_teams')->insert([
            'user_id' => 3,
            'team_id' => 3,
        ]);
    }
}
