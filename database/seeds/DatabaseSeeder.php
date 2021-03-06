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
      $this->call(LocationSeeder::class);
      $this->call(TicketTypeSeeder::class);
      $this->call(EmployeesSeeder::class);
      $this->call(RolesSeeder::class);
      $this->call(AdminSeeder::class);
      $this->call(FlightsSeeder::class);
      $this->call(UserSeeder::class);
      $this->call(CRMSeeder::class);
    }
}
