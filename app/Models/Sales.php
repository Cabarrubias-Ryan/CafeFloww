<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
  use SoftDeletes;
  protected $table = 'sales';
  protected $fillable = [
    'id',
    'date',
    'amount',
    'order_id',
    'iser_id',
    'product_id',
    'discount',
    'status',
    'net_amount',
    'created_at',
    'updated_at',
    'deleted_at',
  ];
}
