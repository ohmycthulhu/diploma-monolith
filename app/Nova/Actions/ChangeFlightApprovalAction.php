<?php

namespace App\Nova\Actions;

use App\Models\Flights\Flight;
use App\Models\FM\Administrator;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\Select;

class ChangeFlightApprovalAction extends Action
{
  use InteractsWithQueue, Queueable;

  /**
   * Perform the action on the given models.
   *
   * @param \Laravel\Nova\Fields\ActionFields $fields
   * @param \Illuminate\Support\Collection $models
   * @return mixed
   */
  public function handle(ActionFields $fields, Collection $models)
  {
    $status = $fields->get('status');
    if (!in_array($status, array_keys($this->availableOptions()))) {
      return Action::danger("Unknown status");
    }
    /* @var Administrator $administrator */
    $administrator = Auth::user();
    foreach ($models as $model) {
      /* @var Flight $model */
      $model->setApproveStatus($administrator, $status);
    }
    return Action::message("Status has changed successfully");
  }

  protected function availableOptions(): array
  {
    return [
      -1 => 'Rejected',
      1 => 'Approved',
    ];
  }

  /**
   * Get the fields available on the action.
   *
   * @return array
   */
  public function fields()
  {
    return [
      Select::make('Status', 'status')
        ->options($this->availableOptions())
    ];
  }
}
