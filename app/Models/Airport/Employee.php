<?php

namespace App\Models\Airport;

use App\Models\Flights\Booking;
use App\Models\Flights\FlightEvent;
use App\Models\Location\Airport;
use App\Models\Transactions\Payment;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User;

class Employee extends User
{
    use SoftDeletes;

    /**
     * Relation to airport
     *
     * @return BelongsTo
    */
    public function airport(): BelongsTo {
      return $this->belongsTo(Airport::class, 'airport_id');
    }

    /**
     * Relation to flight events
     *
     * @return HasMany
    */
    public function flightEvents(): HasMany {
      return $this->hasMany(FlightEvent::class, 'employee_id');
    }

    /**
     * Relation to bookings
     *
     * @return HasMany
    */
    public function bookings(): HasMany {
      return $this->hasMany(Booking::class, 'employee_id');
    }

    /**
     * Relation to the payments
     *
     * @return HasMany
    */
    public function payments(): HasMany {
      return $this->hasMany(Payment::class, 'employee_id');
    }
}
