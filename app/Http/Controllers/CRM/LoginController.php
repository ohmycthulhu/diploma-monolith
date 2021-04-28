<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use App\Http\Requests\CRM\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{

  public function __construct()
  {
    $this->middleware('guest:airport,crm.home');
  }

  /**
   * Page view for login
   *
   * @return View
  */
  public function getPage(): View {
    return view('crm.login');
  }

  public function login(LoginRequest $request) {
    $attempt = Auth::guard('airport')->attempt($request->validated());

    if ($attempt) {
      return redirect(route('crm.home'));
    } else {
      return redirect()->back();
    }
  }
}
