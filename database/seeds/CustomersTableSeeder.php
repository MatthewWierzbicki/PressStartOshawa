<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('customers')->delete();

        DB::table('customers')->insert(array(
    		array('firstName'=>'Aaron', 'lastName'=>'Doe', 'phoneNumber'=>rand(1000000000, 9999999999), 'email'=>'aarondoe@gmail.com'),
    		array('firstName'=>'Donald', 'lastName'=>'Duck', 'phoneNumber'=>rand(1000000000, 9999999999), 'email'=>'donaldduck@gmail.com'),
    		array('firstName'=>'Mickey', 'lastName'=>'Mouse', 'phoneNumber'=>rand(1000000000, 9999999999), 'email'=>'mickeymouse@gmail.com'),
    		array('firstName'=>'Stitch', 'lastName'=>'The Alien', 'phoneNumber'=>rand(1000000000, 9999999999), 'email'=>'stitches@gmail.com'),
    		array('firstName'=>'Bob', 'lastName'=>'Ross', 'phoneNumber'=>rand(1000000000, 9999999999), 'email'=>'bobross@gmail.com'),
    		array('firstName'=>'Tom', 'lastName'=>'Selleck', 'phoneNumber'=>rand(1000000000, 9999999999), 'email'=>'tomselleck@gmail.com'),
    		array('firstName'=>'Matt', 'lastName'=>'Wierzbicki', 'phoneNumber'=>rand(1000000000, 9999999999), 'email'=>'mattwierzbicki@gmail.com'),
    		array('firstName'=>'Joey', 'lastName'=>'Lees', 'phoneNumber'=>rand(1000000000, 9999999999), 'email'=>'joeylees@gmail.com'),
    		array('firstName'=>'Nick', 'lastName'=>'Carpenter', 'phoneNumber'=>rand(1000000000, 9999999999), 'email'=>'nickcarpenter@gmail.com'),
    		array('firstName'=>'Hamza', 'lastName'=>'Naseer', 'phoneNumber'=>rand(1000000000, 9999999999), 'email'=>'hamzanaseer@gmail.com'),
    		array('firstName'=>'Brooklyn', 'lastName'=>'McAllister', 'phoneNumber'=>rand(1000000000, 9999999999), 'email'=>'brooklynmcallister@gmail.com'),
    		array('firstName'=>'Arthur', 'lastName'=>'Aardvark', 'phoneNumber'=>rand(1000000000, 9999999999), 'email'=>'arthuraardvark@gmail.com')
    	));
    }
}
