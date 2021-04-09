<?php

namespace App\Nova\Resources\FM;

use App\Nova\Resource;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Field;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class Role extends Resource
{
  /**
   * The model the resource corresponds to.
   *
   * @var string
   */
  public static $model = \App\Models\FM\Role::class;

  /**
   * The single value that should be used to represent the resource when being displayed.
   *
   * @var string
   */
  public static $title = 'name';

  /**
   * The columns that should be searched.
   *
   * @var array
   */
  public static $search = [
    'id', 'name',
  ];

  public static $group = 'Users';

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

      Text::make(__('Name'), 'name')->sortable(),

      $this->getPermissionField(__('Can see flights?'), 'can_see_flights'),
      $this->getPermissionField(__('Can create flights?'), 'can_create_flights'),
      $this->getPermissionField(__('Can approve flights?'), 'can_approve_flights'),
      $this->getPermissionField(__('Can see flight\'s details?'), 'can_see_flight_details'),
      $this->getPermissionField(__('Can manage users?'), 'can_manage_users'),

      HasMany::make(__('Administrators'), 'administrators', Administrator::class),
    ];
  }

  /**
   * Method to get the field for permission
   *
   * @param string $name
   * @param string $column
   *
   * @return Field
   */
  protected function getPermissionField(string $name, string $column): Field
  {
    return Boolean::make($name, $column)
      ->sortable();
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
