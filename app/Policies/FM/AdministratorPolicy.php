<?php

namespace App\Policies\FM;

use App\Models\FM\Administrator;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class AdministratorPolicy
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
        return Gate::check('manageUsers');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\FM\Administrator  $administrator
     * @param  \App\Models\FM\Administrator  $administrator
     * @return mixed
     */
    public function view(Administrator $administrator,  Administrator $object)
    {
        return $this->viewAny($administrator) || $object->id === $administrator->id;
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
     * @param  \App\Models\FM\Administrator  $administrator
     * @return mixed
     */
    public function update(Administrator $administrator, Administrator $object)
    {
      return Gate::check('manageUsers');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\FM\Administrator  $administrator
     * @param  \App\Models\FM\Administrator  $administrator
     * @return mixed
     */
    public function delete(Administrator $administrator, Administrator $object)
    {
      return Gate::check('manageUsers');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\FM\Administrator  $administrator
     * @param  \App\Models\FM\Administrator  $administrator
     * @return mixed
     */
    public function restore(Administrator $administrator, Administrator $object)
    {
      return Gate::check('manageUsers');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\FM\Administrator  $administrator
     * @param  \App\Models\FM\Administrator  $administrator
     * @return mixed
     */
    public function forceDelete(Administrator $administrator, Administrator $object)
    {
      return Gate::check('manageUsers');
    }
}
