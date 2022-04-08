<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            'title' => Str::random(5),
            'body' => Str::random(20),
            'user_id' => 1,
        ]);
    }
}
