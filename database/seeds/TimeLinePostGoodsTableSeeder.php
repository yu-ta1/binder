<?php

use Illuminate\Database\Seeder;

class TimeLinePostGoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('time_line_post_goods')->insert([
            'user_id' => 1,
            'time_line_post_id' => 1,
        ]);
    }
}
