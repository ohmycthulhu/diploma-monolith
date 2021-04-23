<?php

use App\Models\Web\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  protected $emails = [
    'example@email.com',
  ];

  protected $amount = 10;

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    foreach ($this->emails as $email) {
      factory(User::class)
        ->create(['email' => $email]);
    }
    if ($this->amount > 0) {
      factory(User::class, $this->amount)
        ->create();
    }
  }
}
