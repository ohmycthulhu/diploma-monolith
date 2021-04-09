<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
  protected $admins = [
    ['username' => 'admin', 'password' => 'password', 'role_id' => 1]
  ];
  protected $model;

  public function __construct()
  {
    $this->model = \App\Models\FM\Administrator::class;
    $this->admins = array_map(
      function ($admin) {
        $admin['password'] = \Illuminate\Support\Facades\Hash::make($admin['password']);
        return $admin;
      },
      $this->admins
    );
  }

  /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->admins as $admin) {
          $this->createUser($admin);
        }
    }

    /**
     * Method to create an user
     *
     * @param ?array $params
     *
     * @return \App\Models\FM\Administrator
    */
    protected function createUser(?array $params) {
      return factory($this->model)
        ->create($params ?? []);
    }
}
