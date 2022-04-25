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
        Schema::create('time_line_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Title', 50);
            $table->string('Body', 2000);
            $table->integer('user_id')->unsigned();
            $table->integer('time_line_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_line_posts');
    }
}
