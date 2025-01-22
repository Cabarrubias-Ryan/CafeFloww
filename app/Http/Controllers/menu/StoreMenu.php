<?php

namespace App\Http\Controllers\menu;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Sales;
use App\Models\Stocks;
use App\Models\Product;
use App\Models\Costumer;
use App\Models\Supplier;
use App\Models\Order_Logs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StoreMenu extends Controller
{
  public function index()
  {
    $number = 6;
    $productCake = DB::table('product')
      ->select('supplier.name as fullname', 'stocks.*', 'product.*')
      ->leftjoin('stocks', 'stocks.product_id', '=', 'product.id')
      ->leftjoin('supplier', 'supplier.id', '=', 'stocks.supplier_id')
      ->where('product.category', 'Cake')
      ->whereNull('product.deleted_at')
      ->paginate($number);

    $productCoffee = DB::table('product')
      ->select('supplier.name as fullname', 'stocks.*', 'product.*')
      ->leftjoin('stocks', 'stocks.product_id', '=', 'product.id')
      ->leftjoin('supplier', 'supplier.id', '=', 'stocks.supplier_id')
      ->where('product.category', 'Coffee')
      ->whereNull('product.deleted_at')
      ->paginate($number);

    $productIcedCoffee = DB::table('product')
      ->select('supplier.name as fullname', 'stocks.*', 'product.*')
      ->leftjoin('stocks', 'stocks.product_id', '=', 'product.id')
      ->leftjoin('supplier', 'supplier.id', '=', 'stocks.supplier_id')
      ->where('product.category', 'Iced Coffee')
      ->whereNull('product.deleted_at')
      ->paginate($number);

    return view('content.menu.store-menu', compact('productCake', 'productCoffee', 'productIcedCoffee'));
  }
  public function addToCart(Request $request)
  {
    $request->productQuantity == null ? ($count = 1) : ($count = $request->productQuantity);

    $product = Cart::where('product_id', $request->productId)
      ->whereNull('deleted_at') // Correct method to check for NULL
      ->select('id', 'quantity')
      ->first();

    if ($product === null) {
      // insert
      $data = [
        'product_id' => $request->productId,
        'users_id' => Auth::id(),
        'quantity' => $count,
        'status' => 'added',
        'created_at' => date('Y-m-d H:i:s'),
      ];

      $cart = Cart::insert($data);
      if ($cart) {
        return redirect()->route('store-menu');
      }
    } else {
      // updated
      $total = $count + $product->quantity;

      $data = [
        'quantity' => $total,
        'updated_at' => date('Y-m-d H:i:s'),
      ];

      $cart = Cart::where('id', $product->id)->update($data);
      if ($cart) {
        return redirect()->route('store-menu');
      }
    }
  }
}
