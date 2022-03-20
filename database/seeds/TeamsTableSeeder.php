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
        $i=1;
        while($i<=10);{
        
            DB::table('users')->insert([
                'name' => Str::random(10)
            ]);
            
            $i++;
        }
    }
}