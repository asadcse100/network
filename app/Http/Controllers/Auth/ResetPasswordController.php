<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Publisher;
use Hash;

class ResetPasswordController extends Controller
{
  use ResetsPasswords;

  protected $redirectTo = 'publisher';

  public function reset(Request $request)
  {
    $request->validate([
      'email' => 'required|email|exists:publishers',
      'password' => 'required|string|min:6|confirmed',
      'password_confirmation' => 'required',

    ]);

    $updatePassword = DB::table('password_resets')
      ->where(['email' => $request->email, 'token' => $request->token])
      ->first();

    if (!$updatePassword)
      return back()->withInput()->with('error', 'Invalid token!');

    $user = Publisher::where('email', $request->email)
      ->update(['password' => Hash::make($request->password)]);

    DB::table('password_resets')->where(['email' => $request->email])->delete();

    return redirect('/publisher/login')->with('status', 'Your password has been changed!');
  }
}
