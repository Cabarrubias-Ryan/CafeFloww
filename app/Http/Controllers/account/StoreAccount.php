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
      ->whereNull('person.deleted_at')
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
  public function editPersonalDetails(Request $request)
  {
    $id = $request->edit_id;
    $data = [
      'firstname' => $request->edit_firstname,
      'middlename' => $request->edit_middlename,
      'lastname' => $request->edit_lastname,
      'birthday' => $request->edit_birthday,
      'phone_number' => $request->edit_phonenumber,
      'sex' => $request->edit_sex,
      'nationality' => $request->edit_nationality,
      'religion' => $request->edit_religion,
      'updated_at' => date('Y-m-d H:i:s'),
    ];

    $person = Person::where('id', $id)->update($data);
    if ($person) {
      return response()->json(['Error' => 0, 'Message' => 'Successfully Updated the Data']);
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

  public function editUser(Request $request)
  {
    $id = $request->edit_Userid;
    $data = [
      'username' => $request->edit_username,
      'password' => Hash::make($request->edit_password),
      'role' => $request->edit_role,
      'email' => $request->edit_email,
      'employee_number' => $request->edit_employeenumber,
      'updated_at' => date('Y-m-d H:i:s'),
    ];

    $user = User::where('id', $id)->update($data);
    if ($user) {
      return response()->json(['Error' => 0, 'Message' => 'Successfully Updated the Data']);
    }
  }
  public function deleteUser(Request $request)
  {
  }
  public function deletePerson(Request $request)
  {
  }
}
