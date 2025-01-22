<?php

namespace App\Http\Controllers\cart;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Stocks;
use App\Models\Product;
use App\Models\Costumer;
use App\Models\Order_Logs;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class StoreCart extends Controller
{
  public function index()
  {
    $cart = Cart::leftjoin('product', 'product.id', '=', 'cart.product_id')
      ->leftjoin('stocks', 'stocks.product_id', '=', 'product.id')
      ->select('cart.*', 'product.*', 'stocks.*', 'cart.id as cart_id')
      ->where('cart.status', '=', 'added')
      ->get();

    return view('content.cart.store-cart', compact('cart'));
  }
  public function removeData(Request $request, $id)
  {
    $data = [
      'status' => 'remove',
      'deleted_at' => date('Y-m-d H:i:s'),
    ];
    $cart = Cart::where('id', $id)->update($data);
    if ($cart) {
      return redirect()->route('store-cart');
    }
  }
  public function orderRemove($id)
  {
    $data = [
      'status' => 'order',
      'deleted_at' => date('Y-m-d H:i:s'),
    ];
    Cart::where('id', $id)->update($data);
  }
  public function orderData(Request $request)
  {
    if (empty($request->totalamount)) {
      return response()->json(['Error' => 1, 'Message' => 'Invalid Order']);
    }

    $data = json_decode($request->cartdata, true);
    $change = $request->payment - $request->totalamount;

    if ($change < 0) {
      return response()->json(['Error' => 1, 'Message' => 'Invalid Payment']);
    }

    $costumerCode = Costumer::orderBy('id', 'desc')->first();
    $data1 = ($costumerCode ? $costumerCode->id : 0) + 1;
    $Code = 'Costumer_0' . $data1;

    $costumer = new Costumer();
    $costumer->costumer_code = $Code;
    $costumer->created_at = Carbon::now();
    $costumer->updated_at = null;
    $costumer->deleted_at = null;

    $costumer->save();
    $ProductOrders = [];
    foreach ($data as $item) {
      $dataOrder = [
        'costumer_id' => $costumer->id,
        'cart_id' => $item['cart_id'],
        'quantity' => $item['quantity'],
        'date' => Carbon::now()->format('Y-m-d'),
        'discount' => null,
        'created_at' => Carbon::now(),
      ];

      $cartprice = Cart::leftjoin('product', 'product.id', '=', 'cart.product_id')
        ->leftjoin('stocks', 'stocks.product_id', '=', 'product.id')
        ->select('cart.*', 'product.*', 'stocks.*', 'cart.id as cart_id')
        ->where('cart.id', '=', $item['cart_id'])
        ->first();
      Order::insert($dataOrder);
      $this->orderRemove($item['cart_id']);

      $cart = Cart::leftjoin('product', 'product.id', '=', 'cart.product_id')
        ->leftjoin('stocks', 'stocks.product_id', '=', 'product.id')
        ->where('cart.id', '=', $item['cart_id'])
        ->first();

      $product = [
        'product' => $item['name'],
        'quantity' => $item['quantity'],
        'price' => $cartprice['price'],
      ];

      $ProductOrders[] = $product;
    }

    $dataLogInsert = [
      'cash' => $request->payment,
      'amount' => $request->totalamount,
      'change' => $change,
      'date' => Carbon::now()->format('Y-m-d'),
      'costumer_id' => $costumer->id,
    ];
    $dataLogs = [
      'cash' => $request->payment,
      'amount' => $request->totalamount,
      'change' => $change,
      'date' => Carbon::now()->format('Y-m-d'),
      'costumer_id' => $Code,
    ];

    $order = Order_Logs::insert($dataLogInsert);
    if ($order) {
      return response()->json([
        'Error' => 0,
        'Message' => 'You Successfully Order',
        'Data' => [
          'OrderLogs' => $dataLogs,
          'ProductLogs' => $ProductOrders,
        ],
      ]);
    }
  }
  public function generatePDF(Request $request)
  {
    $orderDetails = $request->orderdetails;
    $productDetails = $request->product;

    if (!$orderDetails || !$productDetails) {
      return response()->json(['error' => 'Missing data'], 400);
    }
    if (is_string($orderDetails)) {
      $orderDetails = json_decode($orderDetails, true);
    }
    if (is_string($productDetails)) {
      $productDetails = json_decode($productDetails, true);
    }

    $pdf = Pdf::loadView('pdf.order', [
      'orderDetails' => $orderDetails,
      'productDetails' => $productDetails,
    ]);
    $pdf->setpaper('A6', 'portrait');
    return $pdf->stream('order.pdf');
  }
}
