<?php

namespace App\Models\Transactions;

use App\Models\Airport\Employee;
use App\Models\Flights\Booking;
use App\Models\Web\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'amount', 'in_progress', 'uuid',
    'is_cache', 'is_card', 'payment_uuid',
    'employee_id', 'user_id',
  ];

  /**
   * Relation to the user
   *
   * @return BelongsTo
   */
  public function user(): BelongsTo {
    return $this->belongsTo(User::class, 'user_id');
  }

  /**
   * Relation to the employee
   *
   * @return BelongsTo
   */
  public function employee(): BelongsTo {
    return $this->belongsTo(Employee::class, 'employee_id');
  }

  /**
   * Relation to the booking
   *
   * @return BelongsTo
   */
  public function booking(): BelongsTo {
    return $this->belongsTo(Booking::class, 'booking_id');
  }
}
