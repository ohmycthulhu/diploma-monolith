<?php

namespace App\Models\FM;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];

    /**
     * Relation to administrators
     *
     * @return HasMany
    */
    public function administrators(): HasMany {
      return $this->hasMany(Administrator::class, 'role_id');
    }
}
