<?php

namespace App\Nova\Resources\Flights;

use App\Nova\Resource;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Field;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;

abstract class FlightBaseResource extends Resource
{
  public static $group = 'Flights';

  /**
   * Method to get approve status field
   *
   * @param string $name
   * @param string $column
   *
   * @return Field
  */
  protected function getApproveStatusField(string $name, string $column): Field {
    return Select::make($name, $column)
      ->options([
        -1 => __('Rejected'),
         0 => __('Waiting'),
         1 => __('Approved')
      ])
      ->readonly()
      ->displayUsingLabels()
      ->sortable();
  }

  /**
   * Method to get flight status
   *
   * @param string $name
   * @param string $column
   *
   * @return Field
  */
  protected function getFlightStatusField(string $name, string $column): Field {
    return Select::make($name, $column)
      ->options([
        0 => __('Waiting'),
        1 => __('Boarding'),
        2 => __('In air'),
        3 => __('Arrived'),
      ])
      ->readonly()
      ->displayUsingLabels()
      ->sortable();
  }
}
