<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
  use SoftDeletes;
  protected $table = 'cart';
  protected $fillable = [
    'id',
    'product_id',
    'users_id',
    'quantity',
    'status',
    'created_at',
    'updated_at',
    'deleted_at',
  ];
}
