<?php

namespace App\Policies\Airport;

use App\Models\Airport\Employee;
use App\Models\FM\Administrator;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class EmployeePolicy
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
        return Gate::check('manageEmployees');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\FM\Administrator  $administrator
     * @param  \App\Models\Airport\Employee  $employee
     * @return mixed
     */
    public function view(Administrator $administrator, Employee $employee)
    {
        return $this->viewAny($administrator);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\FM\Administrator  $administrator
     * @return mixed
     */
    public function create(Administrator $administrator)
    {
      return $this->viewAny($administrator);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\FM\Administrator  $administrator
     * @param  \App\Models\Airport\Employee  $employee
     * @return mixed
     */
    public function update(Administrator $administrator, Employee $employee)
    {
      return $this->viewAny($administrator);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\FM\Administrator  $administrator
     * @param  \App\Models\Airport\Employee  $employee
     * @return mixed
     */
    public function delete(Administrator $administrator, Employee $employee)
    {
      return $this->viewAny($administrator);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\FM\Administrator  $administrator
     * @param  \App\Models\Airport\Employee  $employee
     * @return mixed
     */
    public function restore(Administrator $administrator, Employee $employee)
    {
      return $this->viewAny($administrator);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\FM\Administrator  $administrator
     * @param  \App\Models\Airport\Employee  $employee
     * @return mixed
     */
    public function forceDelete(Administrator $administrator, Employee $employee)
    {
      return $this->viewAny($administrator);
    }
}
