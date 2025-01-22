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
  public function editSupplier(Request $request)
  {
    $id = $request->Edit_supplier_id;

    $data = [
      'name' => $request->Edit_supplier,
      'phone' => $request->Edit_phonenumber,
      'address' => $request->Edit_address,
      'description' => $request->Edit_description,
      'updated_at' => date('Y-m-d H:i:s'),
    ];
    $supplier = Supplier::where('id', $id)->update($data);

    if ($supplier) {
      return response()->json(['Error' => 0, 'Message' => 'You Successfully Updated the Data']);
    } else {
      return response()->json(['Error' => 1, 'Message' => 'Failed to edit the supplier']);
    }
  }
  public function deleteSupplier(Request $request)
  {
    $productID = $request->id;
    if (empty($productID)) {
      return response()->json(['Error' => 1, 'Message' => 'Invalid product ID.']);
    }

    $dataProduct = [
      'deleted_at' => date('Y-m-d H:i:s'),
    ];

    $product = Supplier::where('id', $productID)->update($dataProduct);

    if ($product) {
      return response()->json(['Error' => 0, 'Message' => 'You Successfully Delete the Data']);
    }
  }
}
