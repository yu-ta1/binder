<?php

use Illuminate\Database\Seeder;

class TimeLinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('time_lines')->insert([
            'team_id' => 1,
        ]);
    }
}