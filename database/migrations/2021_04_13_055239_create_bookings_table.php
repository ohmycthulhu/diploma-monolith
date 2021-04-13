<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
              ->nullable()
              ->references('id')
              ->on('users')
              ->nullOnDelete();
            $table->string('name');
            $table->string('passport_uuid');
            $table->string('phone');
            $table->string('email');
            $table->date('birthdate');
            $table->boolean('is_male');
            $table->foreignId('employee_id')
              ->nullable()
              ->references('id')
              ->on('employees');

            $table->boolean('is_approved')
              ->nullable();
            $table->foreignId('flight_id')
              ->references('id')
              ->on('flights')
              ->cascadeOnDelete();

            $table->float('price');

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
        Schema::dropIfExists('bookings');
    }
}
