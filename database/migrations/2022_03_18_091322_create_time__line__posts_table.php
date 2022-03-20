<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeLinePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time__line__posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Title', 50);
            $table->string('Body', 2000);
            $table->bigIncrements('user_id')->unsigned();
            $table->bigIncrements('time_line_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time__line__posts');
    }
}
