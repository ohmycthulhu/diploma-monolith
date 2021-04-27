<?php

namespace App\Models\Flights;

use App\Models\FM\Administrator;
use App\Models\Location\Airport;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

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
      return $this->hasMany(FlightTicketType::class, 'flight_id');
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

    /**
     * Scope arrival airport
     *
     * @param Builder $query
     * @param array|int $airportId
     *
     * @return Builder
    */
    public function scopeArrival(Builder $query, $airportId): Builder {
      return $this->scopeDestination($query, 'arriv_id', $airportId);
    }

    /**
     * Scope departure airport
     *
     * @param Builder $query
     * @param array|int $airportId
     *
     * @return Builder
    */
    public function scopeDeparture(Builder $query, $airportId): Builder {
      return $this->scopeDestination($query, 'depart_id', $airportId);
    }

    protected function scopeDestination(Builder $query, string $column, $location): Builder {
      if ($query) {
        if (is_array($location)) {
          $query->whereIn($column, $location);
        } else {
          $query->where($column, $location);
        }
      }
      return $query;
    }

    /**
     * Method to format duration
     *
     * @return string
    */
    public function getFormattedDurationAttribute(): string {
      $hours = floor($this->duration / 60);
      $minutes = $this->duration % 60;

      return ($hours >= 10 ? $hours : "0$hours") . " hrs ".($minutes >= 10 ? $minutes : "0$minutes")." mins";
    }

    /**
     * Method to get formatted departure time
     *
     * @return string
    */
    public function getFormattedDepartureTimeAttribute(): string {
      return $this->formatTime($this->flight_datetime);
    }

    /**
     * Method to get formatted departure time
     *
     * @return string
    */
    public function getFormattedArrivalTimeAttribute(): string {
      $time = new Carbon($this->flight_datetime);
      return $this->formatTime($time->addMinutes($this->duration));
    }

    /**
     * Method to get formatted departure time
     *
     * @param Carbon $time
     *
     * @return string
    */
    protected function formatTime(Carbon $time): string {
      return $time->format("H.i");
    }

    /**
     * Attribute for the price
     *
     * @return ?string
    */
    public function getRandomPriceAttribute(): ?float {
      return !empty($this->ticketTypes) ? number_format($this->ticketTypes[0]->price, 2) : null;
    }
}
