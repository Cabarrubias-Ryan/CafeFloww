<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class LoginBasic extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-login-basic');
  }
  public function loginAccount(Request $request)
  {
    Validator::make($request->all(), [
      'username' => 'required',
      'password' => 'required',
    ])->validate();

    if (!Auth::attempt($request->only('username', 'password'))) {
      throw ValidationException::withMessages([
        'username' => trans('auth.failed'),
      ]);
    }

    $request->session()->regenerate();

    return redirect()->route('store-menu');
  }
  public function logoutAccount(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('auth-login-basic');
  }
}
