<?php

namespace App\Http\Controllers\inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreInventory extends Controller
{
  public function index()
  {
    return view('content.inventory.store-inventory');
  }
}
