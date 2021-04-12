<?php

namespace App\Models\Flights;

use App\Models\Airport\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class FlightEvent extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'status_prev', 'status_next',
  ];

  /**
   * Relation to the flight
   *
   * @return BelongsTo
   */
  public function flight(): BelongsTo {
    return $this->belongsTo(Flight::class, 'flight_id');
  }

  /**
   * Relation to employee
   *
   * @return BelongsTo
  */
  public function employee(): BelongsTo {
    return $this->belongsTo(Employee::class, 'employee_id');
  }
}
