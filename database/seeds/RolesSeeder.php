<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
  protected $roles = [
    [
      'id' => 1,
      'name' => 'Admin',
      'can_see_flights' => true,
      'can_create_flights' => true,
      'can_approve_flights' => true,
      'can_see_flight_details' => true,
      'can_manage_users' => true,
      'can_manage_employees' => true,
    ],
    [
      'id' => 2,
      'name' => 'Operator',
      'can_see_flights' => true,
      'can_create_flights' => true,
      'can_approve_flights' => false,
      'can_see_flight_details' => true,
      'can_manage_users' => false,
      'can_manage_employees' => false,
    ],
    [
      'id' => 3,
      'name' => 'Visitor',
      'can_see_flights' => true,
      'can_create_flights' => false,
      'can_approve_flights' => false,
      'can_see_flight_details' => true,
      'can_manage_users' => false,
      'can_manage_employees' => false,
    ]
  ];

  protected $model;

  public function __construct()
  {
    $this->model = new \App\Models\FM\Role;
  }

  /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->roles as $roleData) {
          if ($this->model::find($roleData['id'])) {
            continue;
          }
          $role = new $this->model;
          foreach ($roleData as $key => $value) {
            $role->{$key} = $value;
          }
          $role->save();
        }
    }
}
