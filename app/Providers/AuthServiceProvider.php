<?php

namespace App\Providers;

use App\Models\Flights\Flight;
use App\Models\Flights\FlightEvent;
use App\Models\FM\Administrator;
use App\Models\FM\Role;
use App\Policies\Flights\FlightEventPolicy;
use App\Policies\Flights\FlightPolicy;
use App\Policies\FM\AdministratorPolicy;
use App\Policies\FM\RolePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
  /**
   * The policy mappings for the application.
   *
   * @var array
   */
  protected $policies = [
    Flight::class => FlightPolicy::class,
    FlightEvent::class => FlightEventPolicy::class,
    Administrator::class => AdministratorPolicy::class,
    Role::class => RolePolicy::class,
  ];

  /**
   * Register any authentication / authorization services.
   *
   * @return void
   */
  public function boot()
  {
    $this->registerPolicies();


    Gate::define(
      'seeFlights',
      $this->getContainsRoleCallback('can_see_flights')
    );
    Gate::define(
      'seeFlightDetails',
      $this->getContainsRoleCallback('can_see_flight_details')
    );
    Gate::define(
      'createFlights',
      $this->getContainsRoleCallback('can_create_flights')
    );
    Gate::define(
      'approveFlights',
      $this->getContainsRoleCallback('can_approve_flights')
    );
    Gate::define(
      'manageUsers',
      $this->getContainsRoleCallback('can_manage_users')
    );
  }

  /**
   * Method to generate callbacks for gates
   *
   * @param string $column
   *
   * @return callback
   */
  protected function getContainsRoleCallback(string $column)
  {
    return function (Administrator $administrator) use ($column) {
      return $administrator->role && $administrator->role->{$column};
    };
  }
}
