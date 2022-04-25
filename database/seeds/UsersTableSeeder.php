<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('users')->insert([
                'id' => 1,
                'name' => Str::random(10),
                'email' => Str::random(10),
                'password' => Hash::make('password'),
            ]);
            
            DB::table('users')->insert([
                'id' => 2,
                'name' => Str::random(10),
                'email' => Str::random(10),
                'password' => Hash::make('password'),
            ]);
            
            DB::table('users')->insert([
                'id' => 3,
                'name' => Str::random(10),
                'email' => Str::random(10),
                'password' => Hash::make('password'),
            ]);
    }
}