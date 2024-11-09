<?php

namespace App\Http\Controllers\sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreSales extends Controller
{
  public function index()
  {
    return view('content.sales.store-sales');
  }
}
