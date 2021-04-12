<?php

use Illuminate\Database\Seeder;

class FlightsSeeder extends Seeder
{
  protected $amount = 100;
  protected $administrator;
  protected $airport;

  public function __construct()
  {
    $this->administrator = new \App\Models\FM\Administrator;
    $this->airport = new \App\Models\Location\Airport;
  }

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    // Get list of administrators who can create flights
    $adminCreators = $this->administrator::query()->canCreateFlights()->get();
    // Get list of administrators who can approve flights
    $adminApprov = $this->administrator::query()->canApproveFlights()->get();

    // Get list of locations
    $airports = $this->airport::all();

    /* For each flights */
    for ($i = 0; $i < $this->amount; $i++) {
      $airpDepart = $airports->random();
      $airpArrive = $airports->filter(function ($a) use ($airpDepart) {
        return $a->id !== $airpDepart->id;
      })->random();
      $admin = $adminCreators->random();
      // Create flight
      /* @var \App\Models\Flights\Flight $flight */
      $flight = factory(\App\Models\Flights\Flight::class)
        ->create([
          'depart_id' => $airpDepart->id,
          'arriv_id' => $airpArrive->id,
          'administrator_id' => $admin->id
        ]);

      // With 25% chance, do nothing
      if (rand(0, 99) >= 75) {
        continue;
      }
      // Select administrator for approve
      $adminApp = $adminApprov->random();

      // With 66% chance, approve the flight
      // With 34% chance, reject the flight
      $status = rand(0, 99) >= 33 ? 1 : -1;

      // Change flight status
      $flight->setApproveStatus($adminApp, $status);

      // Add ticket types
      $flight->ticketTypes()
        ->createMany(
          factory(\App\Models\Flights\TicketType::class, 3)
            ->make()
            ->toArray()
        );
    }
  }
}
