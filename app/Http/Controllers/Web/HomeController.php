<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Route to home page
     *
     * @return View
    */
    public function home(): View {
      return view('home');
    }
}
