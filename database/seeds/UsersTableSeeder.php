<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        
        DB::table('users')->insert([
          'userName' => 'admin',
          'password' => bcrypt('password'),
          'fullName' => 'Liam Bull',
          'type' => 'A',
          'SIN' => '123456789',
          'email' => 'admin@pressstart.com',
          'phoneNumber' => '2894041234',
          'address' => '123 Admin Dr'
      ]);

        DB::table('users')->insert([
            'userName' => 'general',
            'password' => bcrypt('password'),
            'fullName' => 'John Doe',
            'type' => 'G',
            'SIN' => '569409121',
            'email' => 'general@pressstart.com',
            'phoneNumber' => '9054361234',
            'address' => '123 General St'
        ]);
    }
}
