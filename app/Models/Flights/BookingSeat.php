<?php

namespace App\Models\Flights;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingSeat extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'seat', 'flight_id', 'ticket_type_id',
      'name', 'is_male', 'birthdate',
    ];

    /**
     * Relation to flight
     *
     * @return BelongsTo
    */
    public function flight(): BelongsTo {
      return $this->belongsTo(Flight::class, 'flight_id');
    }

    /**
     * Relation to booking
     *
     * @return BelongsTo
    */
    public function booking(): BelongsTo {
      return $this->belongsTo(Booking::class, 'booking_id');
    }

    /**
     * Relation to ticket type
     *
     * @return BelongsTo
    */
    public function ticketType(): BelongsTo {
      return $this->belongsTo(TicketType::class, 'ticket_type_id');
    }
}
