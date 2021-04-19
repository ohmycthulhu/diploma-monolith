<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightTicketTypesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('flight_ticket_types', function (Blueprint $table) {
      $table->id();


      $table->foreignId('flight_id')
        ->references('id')
        ->on('flights')
        ->cascadeOnDelete();
      $table->foreignId('ticket_type_id')
        ->references('id')
        ->on('ticket_types')
        ->cascadeOnDelete();

      $table->float('price');
      $table->unsignedInteger('seats');

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
    Schema::dropIfExists('flight_ticket_types');
  }
}
