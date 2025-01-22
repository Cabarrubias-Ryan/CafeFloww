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
    } else {
      return response()->json(['Error' => 1, 'Message' => 'Empty Picture']);
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
  public function editProduct(Request $request)
  {
    $Product_id = $request->edit_id;

    $stockId = Stocks::where('product_id', $Product_id)
      ->select('id')
      ->first();

    $dataProduct = [
      'name' => $request->edit_product,
      'category' => $request->edit_category,
      'product_code' => $request->edit_productcode,
      'description' => $request->edit_description,
      'updated_at' => date('Y-m-d H:i:s'),
    ];

    $dataStock = [
      'price' => $request->edit_price,
      'updated_at' => date('Y-m-d H:i:s'),
    ];

    $product = Product::where('id', $Product_id)->update($dataProduct);
    $stocks = Stocks::where('id', $stockId->id)->update($dataStock);
    if ($product && $stocks) {
      return response()->json(['Error' => 0, 'Message' => 'You Successfully Updated the Data']);
    } else {
      return response()->json(['Error' => 1, 'Message' => 'Failed to edit the supplier']);
    }
  }
  public function deleteProduct(Request $request)
  {
    $productID = $request->id;
    if (empty($productID)) {
      return response()->json(['Error' => 1, 'Message' => 'Invalid product ID.']);
    }

    $dataProduct = [
      'deleted_at' => date('Y-m-d H:i:s'),
    ];

    $product = Product::where('id', $productID)->update($dataProduct);

    if ($product) {
      return response()->json(['Error' => 0, 'Message' => 'You Successfully Delete the Data']);
    }
  }
}
