<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingSeatsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('booking_seats', function (Blueprint $table) {
      $table->id();
      $table->foreignId('booking_id')
        ->references('id')
        ->on('bookings')
        ->cascadeOnDelete();

      $table->foreignId('flight_id')
        ->comment('Automatically added to speed up checks')
        ->references('id')
        ->on('flights')
        ->cascadeOnDelete();

      $table->unsignedInteger('seat');

      $table->foreignId('flight_ticket_type_id')
//        ->references('id')
//        ->on('flight_ticket_types')
//        ->nullOnDelete();
;

      $table->string('name');
//      $table->boolean('is_male');
//      $table->date('birthdate');

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
    Schema::dropIfExists('booking_seats');
  }
}
