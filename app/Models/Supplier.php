<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
  use SoftDeletes;
  protected $table = 'supplier';
  protected $fillable = ['id', 'name', 'phone', 'address', 'description', 'created_at', 'updated_at', 'deleted_at'];
}
