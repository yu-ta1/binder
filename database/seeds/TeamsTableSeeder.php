<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            'user_id' => 1,
            'name' => '小学校',
        ]);
        
        DB::table('teams')->insert([
            'user_id' => 1,
            'name' => '中学校',
        ]);
        
        DB::table('teams')->insert([
            'user_id' => 1,
            'name' => '高校',
        ]);
        
        DB::table('teams')->insert([
            'user_id' => 2,
            'name' => '大学',
        ]);
        
        DB::table('teams')->insert([
            'user_id' => 2,
            'name' => '専門学校',
        ]);
        
        DB::table('teams')->insert([
            'user_id' => 3,
            'name' => '保育園',
        ]);
        
        DB::table('teams')->insert([
            'user_id' => 4,
            'name' => '幼稚園',
        ]);
    }
}