<?php

namespace App\Models\Flights;

use App\Models\FM\Administrator;
use App\Models\Location\Airport;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Flight extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'flight_datetime', 'duration',
      'description',
      'depart_id', 'arriv_id',
      'approve_status', 'flight_status',
      'administrator_id'
    ];

    protected $casts = [
      'flight_datetime' => 'datetime'
    ];

    /**
     * Method to set the approve status of the flight
     *
     * @param Administrator $admin
     * @param int $status
     *
     * @return $this
    */
    public function setApproveStatus(Administrator $admin, int $status): self {
      $prevStatus = $this->approve_status;
      if ($prevStatus !== $status) {
        $this->approveStatusChanges()
          ->create([
            'status_prev' => $prevStatus ?? 0,
            'status_next' => $status ?? 0,
            'administrator_id' => $admin->id,
          ]);
        $this->approve_status = $status;
        $this->save();
      }
      return $this;
    }

    /**
     * Relation to airports
    */

    /**
     * Relation to department airport
     *
     * @return BelongsTo
    */
    public function airportDepart(): BelongsTo {
      return $this->belongsTo(Airport::class, 'depart_id');
    }

    /**
     * Relation to arrival airport
     *
     * @return BelongsTo
    */
  public function airportArrival(): BelongsTo {
    return $this->belongsTo(Airport::class, 'arriv_id');
  }

    /**
     * Relation to approve status changes
     *
     * @return HasMany
    */
    public function approveStatusChanges(): HasMany {
      return $this->hasMany(FlightApproveStatusChange::class, 'flight_id');
    }

    /**
     * Relation to events
     *
     * @return HasMany
    */
    public function events(): HasMany {
      return $this->hasMany(FlightEvent::class, 'flight_id');
    }

    /**
     * Relation to administrator
     *
     * @return BelongsTo
    */
    public function administrator(): BelongsTo {
      return $this->belongsTo(Administrator::class, 'administrator_id');
    }

    /**
     * Relation to ticket types
     *
     * @return HasMany
    */
    public function ticketTypes(): HasMany {
      return $this->hasMany(TicketType::class, 'flight_id');
    }

    /**
     * Relation to bookings
     *
     * @return HasMany
    */
    public function bookings(): HasMany {
      return $this->hasMany(Booking::class, 'flight_id');
    }

    /**
     * Relation to booking seats
     *
     * @return HasMany
    */
    public function seats(): HasMany {
      return $this->hasMany(BookingSeat::class, 'flight_id');
    }


    /**
     * Scope by approve status
     *
     * @param Builder $query
     * @param int $status
     *
     * @return Builder
    */
    public function scopeApproveStatus(Builder $query, int $status): Builder {
      return $query->where('approve_status', $status);
    }

    /**
     * Scope by availability
     *
     * @param Builder $query
     *
     * @return Builder
    */
    public function scopePubliclyAvailable(Builder $query): Builder {
      return $query->where('approve_status', 1)
        ->where('flight_status', 0);
    }

    /**
     * Group by destination
     *
     * @param Builder $query
     *
     * @return Builder
    */
    public function scopeGroupByDestination(Builder $query): Builder {
      return $query->groupBy('arriv_id');
    }
}
