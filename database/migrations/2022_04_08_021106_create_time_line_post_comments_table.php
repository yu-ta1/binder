<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeLinePostCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_line_post_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('body', 500);
            $table->integer('user_id')->unsigned();
            $table->integer('time_line_post_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_line_post_comments');
    }
}
