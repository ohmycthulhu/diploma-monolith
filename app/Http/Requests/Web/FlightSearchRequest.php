<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class FlightSearchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'country' => 'nullable|string',
          'city_to' => 'nullable|numeric',
          'airport_to' => 'nullable|numeric',

          'city_from' => 'nullable|numeric',
          'airport_from' => 'nullable|numeric',

          'price_from' => 'nullable|numeric',
          'price_to' => 'nullable|numeric',

          'depart_date' => 'nullable|date',
        ];
    }
}
