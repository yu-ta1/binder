<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notice__posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Title', 50);
            $table->string('Body', 2000);
            $table->integer('user_id')->unsigned();
            $table->integer('notice_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notice__posts');
    }
}
