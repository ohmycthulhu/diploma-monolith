<?php

namespace App\Models\Flights;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class FlightTicketType extends Model
{
  use SoftDeletes;

  /**
   * Relation to flight
   *
   * @return BelongsTo
   */
  public function flight(): BelongsTo {
    return $this->belongsTo(Flight::class, 'flight_id');
  }

  /**
   * Relation to ticket type
   *
   * @return BelongsTo
  */
  public function ticketType(): BelongsTo {
    return $this->belongsTo(TicketType::class, 'ticket_type_id');
  }

  /**
   * Relation to booked seats
   *
   * @return HasMany
   */
  public function seats(): HasMany {
    return $this->hasMany(BookingSeat::class, 'flight_ticket_type_id');
  }
}
