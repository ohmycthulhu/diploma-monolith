<?php

use App\Models\Airport\Employee;
use Illuminate\Database\Seeder;

class EmployeesSeeder extends Seeder
{
  protected $amount = 20;

  protected $predefined = [
    ['email' => 'operator@email.com', 'password' => 'password'],
    ['email' => 'other@email.com', 'password' => 'password'],
  ];

  public function __construct()
  {
    $this->predefined = array_map(
      function ($user) {
        return array_merge($user, ['password' => \Illuminate\Support\Facades\Hash::make($user['password'])]);
      },
      $this->predefined
    );
  }

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $airports = \App\Models\Location\Airport::all();

    foreach ($this->predefined as $params) {
      $this->createEmployee(array_merge($params, ['airport_id' => $airports->random()->id]));
    }

    for ($i = 0; $i < $this->amount; $i++) {
      $this->createEmployee(['airport_id' => $airports->random()->id]);
    }
  }

  /**
   * Create employee
   *
   * @param ?array $params
   *
   * @return Employee
  */
  protected function createEmployee(?array $params = null): Employee {
    return factory(Employee::class)
      ->create($params ?? []);
  }
}
