<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'code', 'image', 'slug'];

    /**
     * Relation to cities
     *
     * @return HasMany
    */
    public function cities(): HasMany {
      return $this->hasMany(City::class, 'country_id');
    }

    /**
     * Relation to airports
     *
     * @return HasManyThrough
    */
    public function airports(): HasManyThrough {
      return $this->hasManyThrough(
        Airport::class,
        City::class,
        'country_id',
        'city_id',
        'id',
        'id'
      );
    }
}
