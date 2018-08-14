<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
        	'name' 				=> 'Cristian torres',
        	'email'				=> 'catorres@smdigital.com.co',
        	'password'		=> bcrypt('CQ5=`W?}+Xw:fF>f'),
          'active'      => 1,
          'role_id'     => 1
        ]);
      factory(App\User::class, 50)->create();
    }
}
