<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\UserLoginFormRequest;
use App\Http\Requests\Web\UserRegistrationFormRequest;
use App\Models\Web\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  /**
   * User model
   * @var User $user
   */
  protected $user;

  /**
   * Creates controller instance
   *
   * @param User $user
   */
  public function __construct(User $user)
  {
    $this->user = $user;
  }

  /**
   * Method to registration
   *
   * @param UserRegistrationFormRequest $request
   *
   * @return RedirectResponse
   */
  public function register(UserRegistrationFormRequest $request): RedirectResponse
  {
    try {
      $user = $this->user::create(array_merge(
        $request->validated(),
        ['password' => Hash::make($request->input('password'))]
      ));
      Auth::login($user);
    } catch (\Exception $exception) {

    }
    return redirect()->back();
  }

  /**
   * Method for logging
   *
   * @param UserLoginFormRequest $request
   *
   * @return RedirectResponse
   */
  public function login(UserLoginFormRequest $request): RedirectResponse
  {
    $user = Auth::attempt($request->validated());

    return redirect()->back();
  }

  /**
   * Method to log out
   *
   * @return RedirectResponse
   */
  public function logout(): RedirectResponse
  {
    Auth::logout();
    return redirect()->back();
  }
}
