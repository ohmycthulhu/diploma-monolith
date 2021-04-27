<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class InputPersonalDataRequest extends FormRequest
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
      'firstName' => 'required|string|max:90',
      'lastName' => 'required|string|max:90',
      'email' => 'required|email',
      'phone' => 'required|string',
      'passport_uuid' => 'required|string',
      'ticket_type_id' => 'required|numeric|exists:flight_ticket_types,id',
      'city_id' => 'required|numeric|exists:cities,id',
    ];
  }
}
