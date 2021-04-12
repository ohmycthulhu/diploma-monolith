<?php

namespace App\Models\Airport;

use App\Models\Location\Airport;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User;

class Employee extends User
{
    use SoftDeletes;

    /**
     * Relation to airport
     *
     * @return BelongsTo
    */
    public function airport(): BelongsTo {
      return $this->belongsTo(Airport::class, 'airport_id');
    }
}
