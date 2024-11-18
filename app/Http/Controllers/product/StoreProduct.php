<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Product;
use Carbon\Carbon;
use App\Models\Stocks;
use Illuminate\Support\Facades\DB;

class StoreProduct extends Controller
{
  public function index()
  {
    $number = 12;
    $productCake = DB::table('product')
      ->select('supplier.name as fullname', 'stocks.*', 'product.*')
      ->leftjoin('stocks', 'stocks.product_id', '=', 'product.id')
      ->leftjoin('supplier', 'supplier.id', '=', 'stocks.supplier_id')
      ->where('product.category', 'Cake')
      ->paginate($number);

    $productCoffee = DB::table('product')
      ->select('supplier.name as fullname', 'stocks.*', 'product.*')
      ->leftjoin('stocks', 'stocks.product_id', '=', 'product.id')
      ->leftjoin('supplier', 'supplier.id', '=', 'stocks.supplier_id')
      ->where('product.category', 'Coffee')
      ->paginate($number);

    $productIcedCoffee = DB::table('product')
      ->select('supplier.name as fullname', 'stocks.*', 'product.*')
      ->leftjoin('stocks', 'stocks.product_id', '=', 'product.id')
      ->leftjoin('supplier', 'supplier.id', '=', 'stocks.supplier_id')
      ->where('product.category', 'Iced Coffee')
      ->paginate($number);

    $supplier = Supplier::all();
    return view(
      'content.product.store-product',
      compact('supplier', 'productCake', 'productCoffee', 'productIcedCoffee')
    );
  }
  public function addProduct(Request $request)
  {
    $product = new Product();

    $data = null;
    if ($request->hasFile('picture')) {
      $photoPath = $request->file('picture')->store('uploads/photos', 'public');
      $data = '/storage/' . $photoPath;
    }

    $product->product_code = $request->productcode;
    $product->name = $request->product;
    $product->description = $request->description;
    $product->discount = null;
    $product->category = $request->category;
    $product->picture = $data;
    $product->created_at = Carbon::now();
    $product->updated_at = null;
    $product->deleted_at = null;

    $product->save();

    $dataStock = [
      'product_id' => $product->id,
      'supplier_id' => $request->supplier,
      'price' => $request->price,
      'created_at' => date('Y-m-d H:i:s'),
    ];

    $stocks = Stocks::insert($dataStock);
    if ($stocks) {
      return response()->json(['Error' => 0, 'Message' => 'Successfully added a product']);
    }
  }
}
