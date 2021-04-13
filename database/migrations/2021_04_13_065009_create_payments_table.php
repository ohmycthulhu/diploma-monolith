<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('payments', function (Blueprint $table) {
      $table->id();

      // Information about payment
      $table->foreignId('booking_id')
        ->nullable()
        ->references('id')
        ->on('bookings')
        ->nullOnDelete();

      $table->float('amount', 8, 2, true);
      $table->boolean('in_progress');
      $table->string('uuid')->unique();
      $table->boolean('is_cache');
      $table->boolean('is_card');
      $table->string('payment_uuid')
        ->nullable()
        ->unique();

      // Created by
      $table->foreignId('employee_id')
        ->nullable()
        ->references('id')
        ->on('employees')
        ->nullOnDelete();

      $table->foreignId('user_id')
        ->nullable()
        ->references('id')
        ->on('users')
        ->nullOnDelete();

      $table->softDeletes();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('payments');
  }
}
