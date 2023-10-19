<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
  public function index()
  {
    return view('admin.setting_landing');
  }

  public function about_us(Request $request)
  {
    
  }
}
