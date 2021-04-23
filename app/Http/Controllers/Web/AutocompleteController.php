<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\AutocompleteRequest;
use App\Models\Location\Airport;
use App\Models\Location\City;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AutocompleteController extends Controller
{
    protected $city;
    protected $airport;

    public function __construct(City $city, Airport $airport)
    {
      $this->city = $city;
      $this->airport = $airport;
    }

    /**
     * Method for autocomplete
     *
     * @param AutocompleteRequest $request
     *
     * @return JsonResponse
    */
    public function autocomplete(AutocompleteRequest $request): JsonResponse {
      $keyword = $request->input('keyword');

      $cities = $this->city::query()->keyword($keyword)->limit(3)->get();
      $airports = $this->airport::query()->keyword($keyword)->limit(6)->get();

      return response()->json([
        'status' => 'success',
        'cities' => $cities,
        'airports' => $airports,
      ]);
    }
}
