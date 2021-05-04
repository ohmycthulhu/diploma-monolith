<?php

namespace App\Policies\Flights;

use App\Models\Flights\FlightEvent;
use App\Models\FM\Administrator;
use App\Models\Flights\FlightApproveStatusChange;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class FlightEventPolicy
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
        return Gate::check('seeFlightDetails');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\FM\Administrator  $administrator
     * @param  mixed  $flightEvent
     * @return mixed
     */
    public function view(Administrator $administrator, $flightEvent)
    {
        return $this->viewAny($administrator);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\FM\Administrator  $administrator
     * @return mixed
     */
    public function create(Administrator $administrator)
    {
      return $this->viewAny($administrator);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\FM\Administrator  $administrator
     * @param  mixed  $flightEvent
     * @return mixed
     */
    public function update(Administrator $administrator, $flightEvent)
    {
      return $this->viewAny($administrator);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\FM\Administrator  $administrator
     * @param  mixed  $flightEvent
     * @return mixed
     */
    public function delete(Administrator $administrator, $flightEvent)
    {
      return $this->viewAny($administrator);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\FM\Administrator  $administrator
     * @param  mixed  $flightEvent
     * @return mixed
     */
    public function restore(Administrator $administrator, $flightEvent)
    {
      return $this->viewAny($administrator);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\FM\Administrator  $administrator
     * @param  mixed  $flightEvent
     * @return mixed
     */
    public function forceDelete(Administrator $administrator, $flightEvent)
    {
      return $this->viewAny($administrator);
    }
}
