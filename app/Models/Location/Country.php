<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'code'];

    /**
     * Relation to cities
     *
     * @return HasMany
    */
    public function cities(): HasMany {
      return $this->hasMany(City::class, 'country_id');
    }
}
