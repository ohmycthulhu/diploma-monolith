<?php

namespace App\Models\Location;

use App\Models\Flights\Flight;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Airport extends Model
{
    use SoftDeletes;

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
}