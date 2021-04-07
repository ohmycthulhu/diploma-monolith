<?php

namespace App\Models\FM;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User;

class Administrator extends User
{
    use SoftDeletes;

    protected $fillable = [
      'name', 'username', 'password'
    ];

    /**
     * TODO: Add relation to role
    */
}
