<?php

namespace App\Nova\Resources\Flights;

use App\Nova\Actions\ChangeFlightApprovalAction;
use App\Nova\Filters\ApproveStatusFilter;
use App\Nova\Resources\Airport;
use App\Nova\Resources\FM\Administrator;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Flight extends FlightBaseResource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Flights\Flight::class;

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
        'id', 'description'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),

          DateTime::make(__('Departure time'), 'flight_datetime')
            ->sortable(),

          Number::make(__('Duration in minutes'), 'duration')
            ->sortable()
            ->rules('required|numeric|min:1'),

          Textarea::make(__('Description'), 'description'),

          $this->getApproveStatusField(__('Approval status'), 'approve_status'),
          $this->getFlightStatusField(__('Flight status'), 'flight_status'),

          BelongsTo::make(__('Administrator'), 'administrator', Administrator::class)
            ->readonly(),
          BelongsTo::make(__('Departure from'), 'airportDepart', Airport::class),
          BelongsTo::make(__('Arrives to'), 'airportArrival', Airport::class),

          HasMany::make(__('Events'), 'events', FlightApproveStatusChange::class)
            ->readonly(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [
          ApproveStatusFilter::make(),
        ];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [
          ChangeFlightApprovalAction::make()
            ->canSeeWhen('approveFlights')
        ];
    }
}
