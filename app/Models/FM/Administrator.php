<?php

namespace App\Models\FM;

use App\Models\Flights\Flight;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User;

class Administrator extends User
{
    use SoftDeletes;

    protected $fillable = [
      'name', 'username', 'password'
    ];

    /**
     * Relation to the role
     *
     * @return BelongsTo
    */
    public function role(): BelongsTo {
      return $this->belongsTo(Role::class, 'role_id');
    }

    /**
     * Relation to the created flights
     *
     * @return HasMany
    */
    public function flights(): HasMany {
      return $this->hasMany(Flight::class, 'administrator_id');
    }
}
