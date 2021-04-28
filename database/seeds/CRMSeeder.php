<?php

use Illuminate\Database\Seeder;

class CRMSeeder extends Seeder
{
    protected $emails = [
      'employee@email.com'
    ];

    protected $amount = 10;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $airports = \App\Models\Location\Airport::all();
      // Try to create predefined employees
        foreach ($this->emails as $email) {
          try {
            factory(\App\Models\Airport\Employee::class)
              ->create(['email' => $email, 'airport_id' => $airports->random()->id]);
          } catch (Exception $exception) {
            echo "Error on creating $email - {$exception->getMessage()}\n";
          }
        }

        // Create some random
        for ($i = 1; $i <= $this->amount; $i++) {
          factory(\App\Models\Airport\Employee::class)
            ->create(['airport_id' => $airports->random()->id]);
        }
    }
}
