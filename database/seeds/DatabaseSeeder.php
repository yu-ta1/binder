<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        $this->call(TeamUserTableSeeder::class);
        $this->call(FilesTableSeeder::class);
        $this->call(NoticesTableSeeder::class);
        $this->call(TimeLinesTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(NoticePostsTableSeeder::class);
        $this->call(TimeLinePostsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(GoodsTableSeeder::class);
        $this->call(NoticePostCommentsTableSeeder::class);
        $this->call(NoticePostGoodsTableSeeder::class);
        $this->call(TimeLinePostCommentsTableSeeder::class);
        $this->call(TimeLinePostGoodsTableSeeder::class);
        $this->call(TasksTableSeeder::class);
        
    }
}
