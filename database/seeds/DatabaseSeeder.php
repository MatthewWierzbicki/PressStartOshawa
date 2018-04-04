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
        $this->call('UsersTableSeeder');
        $this->command->info('Users table seeded.');

        $this->call('CustomersTableSeeder');
        $this->command->info('Customers table seeded.');
    }
}

?>