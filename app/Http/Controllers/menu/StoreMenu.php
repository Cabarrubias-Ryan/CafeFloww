<?php

namespace App\Http\Controllers\menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreMenu extends Controller
{
  public function index()
  {
    return view('content.menu.store-menu');
  }
}
