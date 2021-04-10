<?php

namespace App\Policies\FM;

use App\Models\FM\Administrator;
use App\Models\FM\Role;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\FM\Administrator  $administrator
     * @return mixed
     */
    public function viewAny(Administrator $administrator)
    {
      return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\FM\Administrator  $administrator
     * @param  \App\Models\FM\Role  $role
     * @return mixed
     */
    public function view(Administrator $administrator, Role $role)
    {
      return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\FM\Administrator  $administrator
     * @return mixed
     */
    public function create(Administrator $administrator)
    {
      return Gate::check('manageUsers');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\FM\Administrator  $administrator
     * @param  \App\Models\FM\Role  $role
     * @return mixed
     */
    public function update(Administrator $administrator, Role $role)
    {
      return Gate::check('manageUsers');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\FM\Administrator  $administrator
     * @param  \App\Models\FM\Role  $role
     * @return mixed
     */
    public function delete(Administrator $administrator, Role $role)
    {
      return Gate::check('manageUsers');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\FM\Administrator  $administrator
     * @param  \App\Models\FM\Role  $role
     * @return mixed
     */
    public function restore(Administrator $administrator, Role $role)
    {
      return Gate::check('manageUsers');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\FM\Administrator  $administrator
     * @param  \App\Models\FM\Role  $role
     * @return mixed
     */
    public function forceDelete(Administrator $administrator, Role $role)
    {
      return Gate::check('manageUsers');
    }
}
