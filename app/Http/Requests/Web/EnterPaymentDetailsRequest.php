<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class EnterPaymentDetailsRequest extends FormRequest
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
      'number' => 'nullable|string',
      'name' => 'nullable|string',
      'expiration_month' => 'nullable|numeric|min:1|max:12',
      'expiration_year' => 'nullable|numeric|min:' . (date('Y') - 2000),
      'ccv' => 'nullable|string|size:3',
    ];
  }
}
