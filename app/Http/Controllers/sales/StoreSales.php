<?php

namespace App\Http\Controllers\sales;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StoreSales extends Controller
{
  public function index()
  {
    $sales = Order::leftjoin('cart', 'cart.id', '=', 'order.cart_id')
      ->leftjoin('product', 'product.id', '=', 'cart.product_id')
      ->select('order.*', 'product.*')
      ->where('cart.users_id', '=', Auth::id())
      ->paginate(9);

    return view('content.sales.store-sales', compact('sales'));
  }
}
