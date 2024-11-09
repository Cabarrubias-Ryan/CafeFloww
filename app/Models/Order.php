<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  use SoftDeletes;
  protected $table = 'order';
  protected $fillable = [
    'id',
    'user_id',
    'product_id',
    'costumer_id',
    'quantity',
    'created_at',
    'updated_at',
    'deleted_at',
  ];
}
