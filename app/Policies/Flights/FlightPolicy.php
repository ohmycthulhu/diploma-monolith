<?php

namespace App\Policies\Flights;

use App\Models\FM\Administrator;
use App\Models\Flights\Flight;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class FlightPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\FM\Administrator  $administrator
     * @return mixed
     */
    public function viewAny(Administrator $administrator)
    {
        return Gate::check('seeFlights');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\FM\Administrator  $administrator
     * @param  \App\Models\Flights\Flight  $flight
     * @return mixed
     */
    public function view(Administrator $administrator, Flight $flight)
    {
        return $this->viewAny($administrator) &&
          Gate::check('seeFlightDetails');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\FM\Administrator  $administrator
     * @return mixed
     */
    public function create(Administrator $administrator)
    {
        return $this->viewAny($administrator) &&
          Gate::check('createFlights');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\FM\Administrator  $administrator
     * @param  \App\Models\Flights\Flight  $flight
     * @return mixed
     */
    public function update(Administrator $administrator, Flight $flight)
    {
        return $this->create($administrator);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\FM\Administrator  $administrator
     * @param  \App\Models\Flights\Flight  $flight
     * @return mixed
     */
    public function delete(Administrator $administrator, Flight $flight)
    {
        return $this->create($administrator);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\FM\Administrator  $administrator
     * @param  \App\Models\Flights\Flight  $flight
     * @return mixed
     */
    public function restore(Administrator $administrator, Flight $flight)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\FM\Administrator  $administrator
     * @param  \App\Models\Flights\Flight  $flight
     * @return mixed
     */
    public function forceDelete(Administrator $administrator, Flight $flight)
    {
        //
    }
}
