<?php

namespace App\Models\Flights;

use App\Models\FM\Administrator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class FlightEvent extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'status_prev', 'status_next',
      'administrator_id'
    ];

    /**
     * Relation to the flight
     *
     * @return BelongsTo
    */
    public function flight(): BelongsTo {
      return $this->belongsTo(Flight::class, 'flight_id');
    }

    /**
     * Relation to the administrator
     *
     * @return BelongsTo
    */
    public function administrator(): BelongsTo {
      return $this->belongsTo(Administrator::class, 'administrator_id');
    }
}
