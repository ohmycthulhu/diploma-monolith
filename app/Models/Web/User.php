<?php

namespace App\Models\Web;

use App\Models\Flights\Booking;
use App\Models\Transactions\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends \Illuminate\Foundation\Auth\User
{
    use SoftDeletes;
    protected $fillable = [
      'name', 'phone', 'email', 'password', 'passport_uuid',
    ];

    /**
     * Relation to bookings
     *
     * @return HasMany
    */
    public function bookings(): HasMany {
      return $this->hasMany(Booking::class, 'user_id');
    }

    /**
     * Relation to payments
     *
     * @return HasMany
    */
    public function payments(): HasMany {
      return $this->hasMany(Payment::class, 'user_id');
    }
}
