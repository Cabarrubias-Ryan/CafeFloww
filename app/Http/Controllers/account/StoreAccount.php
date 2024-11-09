<?php

namespace App\Http\Controllers\account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreAccount extends Controller
{
  public function index()
  {
    return view('content.accounts.store-user');
  }

  public function addPersonalDetails(Request $request)
  {
  }
}
