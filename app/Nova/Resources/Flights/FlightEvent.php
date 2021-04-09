<?php

namespace App\Nova\Resources\Flights;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;

class FlightEvent extends FlightBaseResource
{
  /**
   * The model the resource corresponds to.
   *
   * @var string
   */
  public static $model = \App\Models\Flights\FlightEvent::class;

  /**
   * The single value that should be used to represent the resource when being displayed.
   *
   * @var string
   */
  public static $title = 'id';

  /**
   * The columns that should be searched.
   *
   * @var array
   */
  public static $search = [
    'id',
  ];

  /**
   * Get the fields displayed by the resource.
   *
   * @param \Illuminate\Http\Request $request
   * @return array
   */
  public function fields(Request $request)
  {
    return [
      ID::make(__('ID'), 'id')->sortable(),

      BelongsTo::make(__('Flight'), 'flight', Flight::class)->sortable(),

      $this->getApproveStatusField(__('Previous status'), 'status_prev'),
      $this->getApproveStatusField(__('Next status'), 'status_next'),

      DateTime::make(__('Datetime'), 'created_at')->sortable(),
    ];
  }

  /**
   * Get the cards available for the request.
   *
   * @param \Illuminate\Http\Request $request
   * @return array
   */
  public function cards(Request $request)
  {
    return [];
  }

  /**
   * Get the filters available for the resource.
   *
   * @param \Illuminate\Http\Request $request
   * @return array
   */
  public function filters(Request $request)
  {
    return [];
  }

  /**
   * Get the lenses available for the resource.
   *
   * @param \Illuminate\Http\Request $request
   * @return array
   */
  public function lenses(Request $request)
  {
    return [];
  }

  /**
   * Get the actions available for the resource.
   *
   * @param \Illuminate\Http\Request $request
   * @return array
   */
  public function actions(Request $request)
  {
    return [];
  }
}
