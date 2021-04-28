<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:airport');
    }

    public function index() {
      $user = Auth::user();
      return response()->json([
        'status' => 'Success',
        'message' => "Hello, {$user->name}"
      ]);
    }
}
