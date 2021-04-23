<?php

namespace App\Models\Location;

use App\Models\Traits\AutocompleteTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes, AutocompleteTrait;

    protected $fillable = ['name'];

    /**
     * Relation to airports
     *
     * @return HasMany
    */
    public function airports(): HasMany {
      return $this->hasMany(Airport::class, 'city_id');
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
