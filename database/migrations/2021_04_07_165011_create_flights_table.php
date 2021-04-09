<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('flights', function (Blueprint $table) {
      $table->id();
      $table->dateTime('flight_datetime');
      $table->unsignedInteger('duration')
        ->comment('Duration of flight in minutes');

      $table->text('description')
        ->nullable();

      // Airports
      $table->foreignId('depart_id')
        ->references('id')
        ->on('airports');
      $table->foreignId('arriv_id')
        ->references('id')
        ->on('airports');

      $table->smallInteger('approve_status')
        ->default(0)
        ->comment("0 for waiting, 1 for approved, -1 for disapproved");

      $table->smallInteger('flight_status')
        ->default(0)
        ->comment("0 for waiting, 1 for boarding, 2 for flight, 3 for arrived");

      $table->foreignId('administrator_id')
        ->comment('Administrator who created the flight')
        ->references('id')
        ->on('administrators');

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
    Schema::dropIfExists('flights');
  }
}
