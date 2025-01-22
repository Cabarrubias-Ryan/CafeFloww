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
    'costumer_id',
    'cart_id',
    'quantity',
    'date',
    'discount',
    'created_at',
    'updated_at',
    'deleted_at',
  ];
}
