<?php

use Illuminate\Database\Seeder;
use App\MusicList;


class MusicListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\MusicList::class, 50)->create();
    }
}
