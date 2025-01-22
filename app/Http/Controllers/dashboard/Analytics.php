<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Order;
use App\Models\Order_Logs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Analytics extends Controller
{
  public function index()
  {
    // Get the orders with their relevant data
    $sales = Order::count();

    $orderlogs = Order_Logs::orderBy('id', 'DESC')
      ->limit(6)
      ->get();

    $totalSales = Order::leftJoin('cart', 'cart.id', '=', 'order.cart_id')
      ->leftJoin('product', 'product.id', '=', 'cart.product_id')
      ->leftJoin('stocks', 'stocks.product_id', '=', 'product.id')
      ->selectRaw('SUM(order.quantity * stocks.price) as total_sales')
      ->first();

    $salesPercategory = Order::leftJoin('cart', 'cart.id', '=', 'order.cart_id')
      ->leftJoin('product', 'product.id', '=', 'cart.product_id')
      ->leftJoin('stocks', 'stocks.product_id', '=', 'product.id')
      ->select(
        DB::raw('
              SUM(CASE WHEN product.category = "Coffee" THEN order.quantity * stocks.price ELSE 0 END) as sales_coffee,
              SUM(CASE WHEN product.category = "Iced Coffee" THEN order.quantity * stocks.price ELSE 0 END) as sales_iced_coffee,
              SUM(CASE WHEN product.category = "Cake" THEN order.quantity * stocks.price ELSE 0 END) as sales_cake
          ')
      )
      ->first();

    $currentYear = date('Y'); // Or specify a custom year, e.g., 2023

    $salesMonth = Order::leftJoin('cart', 'cart.id', '=', 'order.cart_id')
      ->leftJoin('product', 'product.id', '=', 'cart.product_id')
      ->leftJoin('stocks', 'stocks.product_id', '=', 'product.id')
      ->select(
        DB::raw("
                  SUM(CASE WHEN YEAR(order.date) = {$currentYear} AND MONTH(order.date) = 1 THEN order.quantity * stocks.price ELSE 0 END) as salesOfJanuary,
                  SUM(CASE WHEN YEAR(order.date) = {$currentYear} AND MONTH(order.date) = 2 THEN order.quantity * stocks.price ELSE 0 END) as salesOfFebruary,
                  SUM(CASE WHEN YEAR(order.date) = {$currentYear} AND MONTH(order.date) = 3 THEN order.quantity * stocks.price ELSE 0 END) as salesOfMarch,
                  SUM(CASE WHEN YEAR(order.date) = {$currentYear} AND MONTH(order.date) = 4 THEN order.quantity * stocks.price ELSE 0 END) as salesOfApril,
                  SUM(CASE WHEN YEAR(order.date) = {$currentYear} AND MONTH(order.date) = 5 THEN order.quantity * stocks.price ELSE 0 END) as salesOfMay,
                  SUM(CASE WHEN YEAR(order.date) = {$currentYear} AND MONTH(order.date) = 6 THEN order.quantity * stocks.price ELSE 0 END) as salesOfJune,
                  SUM(CASE WHEN YEAR(order.date) = {$currentYear} AND MONTH(order.date) = 7 THEN order.quantity * stocks.price ELSE 0 END) as salesOfJuly,
                  SUM(CASE WHEN YEAR(order.date) = {$currentYear} AND MONTH(order.date) = 8 THEN order.quantity * stocks.price ELSE 0 END) as salesOfAugust,
                  SUM(CASE WHEN YEAR(order.date) = {$currentYear} AND MONTH(order.date) = 9 THEN order.quantity * stocks.price ELSE 0 END) as salesOfSeptember,
                  SUM(CASE WHEN YEAR(order.date) = {$currentYear} AND MONTH(order.date) = 10 THEN order.quantity * stocks.price ELSE 0 END) as salesOfOctober,
                  SUM(CASE WHEN YEAR(order.date) = {$currentYear} AND MONTH(order.date) = 11 THEN order.quantity * stocks.price ELSE 0 END) as salesOfNovember,
                  SUM(CASE WHEN YEAR(order.date) = {$currentYear} AND MONTH(order.date) = 12 THEN order.quantity * stocks.price ELSE 0 END) as salesOfDecember
              ")
      )
      ->first();

    return view(
      'content.dashboard.dashboards-analytics',
      compact('totalSales', 'salesPercategory', 'sales', 'orderlogs', 'salesMonth')
    );
  }
}
