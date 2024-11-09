<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreProduct extends Controller
{
  public function index()
  {
    return view('content.product.store-product');
  }
}
