<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class User extends Model implements AuthenticatableContract
{
  use SoftDeletes, Authenticatable;
  protected $table = 'users';
  protected $fillable = [
    'id',
    'person_id',
    'username',
    'password',
    'role',
    'email',
    'employee_number',
    'created_at',
    'updated_at',
    'deleted_at',
  ];
}
