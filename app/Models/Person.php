<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
  use SoftDeletes;
  protected $table = 'person';
  protected $fillable = [
    'id',
    'firstname',
    'middlename',
    'lastname',
    'birthday',
    'phone_number',
    'sex',
    'nationality',
    'religion',
    'created_at',
    'updated_at',
    'deleted_at',
  ];
}
