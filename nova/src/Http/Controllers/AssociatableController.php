<?php

namespace Laravel\Nova\Http\Controllers;

use \Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Laravel\Nova\Contracts\RelatableField;
use Laravel\Nova\Http\Requests\NovaRequest;

class AssociatableController extends Controller
{
  /**
   * List the available related resources for a given resource.
   *
   * @param \Laravel\Nova\Http\Requests\NovaRequest $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function index(NovaRequest $request): \Illuminate\Http\JsonResponse
  {
    $field = $request->newResource()
      ->availableFields($request)
      ->whereInstanceOf(RelatableField::class)
      ->findFieldByAttribute($request->field);

    $withTrashed = $this->shouldIncludeTrashed(
      $request, $associatedResource = $field->resourceClass
    );

    return response()->json([
      'resources' => $field->buildAssociatableQuery($request, $withTrashed)->get()
        ->mapInto($field->resourceClass)
        ->filter->authorizedToAdd($request, $request->model())
        ->map(function ($resource) use ($request, $field) {
          return $field->formatAssociatableResource($request, $resource);
        })->sortBy('display')->values(),
      'softDeletes' => $associatedResource::softDeletes(),
      'withTrashed' => $withTrashed,
    ]);
  }

  /**
   * Determine if the query should include trashed models.
   *
   * @param \Laravel\Nova\Http\Requests\NovaRequest $request
   * @param string $associatedResource
   * @return bool
   */
  protected function shouldIncludeTrashed(NovaRequest $request, $associatedResource)
  {
    if ($request->withTrashed === 'true') {
      return true;
    }

    $associatedModel = $associatedResource::newModel();

    if ($request->current && empty($request->search) && $associatedResource::softDeletes()) {
      $associatedModel = $associatedModel->newQueryWithoutScopes()->find($request->current);

      return $associatedModel ? $associatedModel->trashed() : false;
    }

    return false;
  }
}
