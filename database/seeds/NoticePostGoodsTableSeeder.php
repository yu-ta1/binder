<?php

use Illuminate\Database\Seeder;

class NoticePostGoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notice_post_goods')->insert([
            'user_id' => 1,
            'notice_post_id' => 1,
        ]);
    }
}
