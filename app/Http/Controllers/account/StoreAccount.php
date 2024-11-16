<?php

namespace App\Http\Controllers\account;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Person;
use Carbon\Carbon;

class StoreAccount extends Controller
{
  public function index()
  {
    $person = Person::orderBy('created_at', 'DESC')->get();
    return view('content.accounts.store-user', compact('person'));
  }
  public function addPersonalDetails(Request $request)
  {
    $data = [
      'firstname' => $request->firstname,
      'middlename' => $request->middlename,
      'lastname' => $request->lastname,
      'birthday' => $request->birthday,
      'phone_number' => $request->phonenumber,
      'sex' => $request->sex,
      'nationality' => $request->nationality,
      'religion' => $request->religion,
      'created_at' => date('Y-m-d H:i:s'),
    ];

    $person = Person::insert($data);
    if ($person) {
      return response()->json(['Error' => 0, 'Message' => 'Reservation Success']);
    }
  }
}
