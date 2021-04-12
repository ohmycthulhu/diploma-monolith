<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightEventsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('flight_events', function (Blueprint $table) {
      $table->id();

      $table->foreignId('flight_id')
        ->references('id')
        ->on('flights');

      $table->smallInteger('status_prev')
        ->default(0)
        ->comment("0 for waiting, 1 for boarding, 2 for flight, 3 for arrived");

      $table->smallInteger('status_next')
        ->default(0)
        ->comment("0 for waiting, 1 for boarding, 2 for flight, 3 for arrived");

      // TODO: Add foreign id to moderator

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
    Schema::dropIfExists('flight_events');
  }
}
