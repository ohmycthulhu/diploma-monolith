<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightApproveStatusChangeTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('flight_approve_status_changes', function (Blueprint $table) {
      $table->id();
      $table->foreignId('flight_id')
        ->references('id')
        ->on('flights');

      $table->smallInteger('status_prev')
        ->default(0)
        ->comment("0 for waiting, -1 for rejected, 1 approved");

      $table->smallInteger('status_next')
        ->default(0)
        ->comment("0 for waiting, -1 for rejected, 1 approved");

      $table->foreignId('administrator_id')
        ->nullable()
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
    Schema::dropIfExists('flight_approve_status_changes');
  }
}
