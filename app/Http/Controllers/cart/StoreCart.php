<?php

namespace App\Http\Controllers\cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreCart extends Controller
{
  public function index()
  {
    return view('content.cart.store-cart');
  }
}
