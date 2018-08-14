<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $this->call(RolesTableSeeder::class);
       $this->call(UsersTableSeeder::class);
       $this->call(MusicListTableSeeder::class);
       $this->call(SongsTableSeeder::class);
       $this->call(LikesTableSeeder::class);
       $this->call(CommentsTableSeeder::class);

    }
}
