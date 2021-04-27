<?php

namespace App\Models\Flights;

use App\Models\Airport\Employee;
use App\Models\Location\City;
use App\Models\Location\Country;
use App\Models\Transactions\Payment;
use App\Models\Web\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'name', 'passport_uuid', 'phone', 'email',
      'birthdate', 'is_male', 'flight_id', 'price',
      'is_approved', 'user_id', 'uuid',
      'city_id', 'country_id',
    ];

    /**
     * Relation to user
     *
     * @return BelongsTo
    */
    public function user(): BelongsTo {
      return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relation to employee
     *
     * @return BelongsTo
    */
    public function employee(): BelongsTo {
      return $this->belongsTo(Employee::class, 'employee_id');
    }

    /**
     * Relation to flight
     *
     * @return BelongsTo
    */
    public function flight(): BelongsTo {
      return $this->belongsTo(Flight::class, 'flight_id');
    }

    /**
     * Relation to seats
     *
     * @return HasMany
    */
    public function seats(): HasMany {
      return $this->hasMany(BookingSeat::class, 'booking_id');
    }

    /**
     * Relation to payments
     *
     * @return HasMany
    */
    public function payments(): HasMany {
      return $this->hasMany(Payment::class, 'booking_id');
    }

    /**
     * Relation to city
     *
     * @return BelongsTo
    */
    public function city(): BelongsTo {
      return $this->belongsTo(City::class, 'city_id');
    }

    /**
     * Relation to country
     *
     * @return BelongsTo
    */
    public function country(): BelongsTo {
      return $this->belongsTo(Country::class, 'country_id');
    }
}
