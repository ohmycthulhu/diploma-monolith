<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
  protected $permissions = [
    'can_see_flights',
    'can_create_flights',
    'can_approve_flights',
    'can_see_flight_details',
    'can_manage_users',
    'can_manage_employees',
  ];
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            /**
             * Permissions
            */
            foreach ($this->permissions as $permission) {
              $table->boolean($permission)
                ->default(false);
            }

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
        Schema::dropIfExists('roles');
    }
}
