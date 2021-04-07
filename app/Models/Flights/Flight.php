<?php

namespace App\Models\Flights;

use App\Models\FM\Administrator;
use App\Models\Location\Airport;
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
}
