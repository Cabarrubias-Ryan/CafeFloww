<?php

namespace App\Http\Controllers\supplier;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreSupplier extends Controller
{
  public function index()
  {
    $number = 12;
    $supplier = Supplier::orderBy('created_at', 'DESC')->paginate($number);
    return view('content.supplier.store-supplier', compact('supplier'));
  }
  public function addSupplier(Request $request)
  {
    $data = [
      'name' => $request->supplier,
      'phone' => $request->phonenumber,
      'address' => $request->address,
      'description' => $request->description,
      'created_at' => date('Y-m-d H:i:s'),
    ];

    $supplier = Supplier::insert($data);
    if ($supplier) {
      return response()->json(['Error' => 0, 'Message' => 'You Successfully added a supplier']);
    }
  }
}
