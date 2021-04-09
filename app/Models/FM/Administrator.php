<?php

namespace App\Models\FM;

use App\Models\Flights\Flight;
use Illuminate\Database\Eloquent\Builder;
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

    protected $with = ['role'];

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

    /**
     * Scope to query only who can create flights
     *
     * @param Builder $query
     *
     * @return Builder
    */
    public function scopeCanCreateFlights(Builder $query): Builder {
      return $query->whereHas('role', function (Builder $query) {
        return $query->where('can_create_flights', true);
      });
    }

    /**
     * Scope to query only who can approve flights
     *
     * @param Builder $query
     *
     * @return Builder
    */
    public function scopeCanApproveFlights(Builder $query): Builder {
      return $query->whereHas('role', function (Builder $query) {
        return $query->where('can_approve_flights', true);
      });
    }
}
