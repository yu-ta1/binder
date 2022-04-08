<?php

use Illuminate\Database\Seeder;

class GoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('goods')->insert([
            'user_id' => 1,
            'post_id' => 1,
        ]);
        
        DB::table('goods')->insert([
            'user_id' => 2,
            'post_id' => 1,
        ]);
    }
}
