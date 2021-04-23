<?php

namespace App\Models\Location;

use App\Models\Airport\Employee;
use App\Models\Flights\Flight;
use App\Models\Traits\AutocompleteTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Airport extends Model
{
    use SoftDeletes, AutocompleteTrait;

    protected $fillable = ['name', 'code'];

    /**
     * Relation to city
     *
     * @return BelongsTo
    */
    public function city(): BelongsTo {
      return $this->belongsTo(City::class, 'city_id');
    }

    /**
     * Relation to flights flying from airport
     *
     * @return HasMany
    */
    public function flightsFrom(): HasMany {
      return $this->hasMany(Flight::class, 'depart_id');
    }

    /**
     * Relation to flights arriving
     *
     * @return HasMany
    */
    public function flightsTo(): HasMany {
      return $this->hasMany(Flight::class, 'arriv_id');
    }

    /**
     * Relation to employees
     *
     * @return HasMany
    */
    public function employees(): HasMany {
      return $this->hasMany(Employee::class, 'airport_id');
    }

    /**
     * Relation to airport
     *
     * @return HasOneThrough
    */
    public function country(): HasOneThrough {
      return $this->hasOneThrough(
        Country::class,
        City::class,
        'id',
        'id',
        'city_id',
        'country_id'
      );
    }
}
