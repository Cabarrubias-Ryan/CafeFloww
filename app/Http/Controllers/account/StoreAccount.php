<?php

namespace App\Http\Controllers\account;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StoreAccount extends Controller
{
  public function index()
  {
    $itemsPerPage = 12;
    $person = Person::orderBy('created_at', 'DESC')->paginate($itemsPerPage);

    $accountholder = DB::table('person')
      ->leftJoin('users', 'users.person_id', '=', 'person.id')
      ->whereNotIn('person.id', function ($query) {
        $query->select('person_id')->from('users');
      })
      ->select('person.id', 'person.firstname', 'person.middlename', 'person.lastname')
      ->get();

    $usersdetails = DB::table('person')
      ->leftJoin('users', 'users.person_id', '=', 'person.id')
      ->whereIn('person.id', function ($query) {
        $query->select('person_id')->from('users');
      })
      ->paginate($itemsPerPage);

    return view('content.accounts.store-user', compact('person', 'accountholder', 'usersdetails'));
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
      return response()->json(['Error' => 0, 'Message' => 'Successfully added a data']);
    }
  }
  public function addUser(Request $request)
  {
    $data = [
      'person_id' => $request->accountholder,
      'username' => $request->username,
      'password' => Hash::make($request->password),
      'role' => $request->role,
      'email' => $request->email,
      'employee_number' => $request->employeenumber,
      'created_at' => date('Y-m-d H:i:s'),
    ];
    $user = User::insert($data);
    if ($user) {
      return response()->json(['Error' => 0, 'Message' => 'Successfully added a user']);
    }
  }
}
