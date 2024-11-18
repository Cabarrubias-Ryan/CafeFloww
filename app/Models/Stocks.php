<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Stocks extends Model
{
  use SoftDeletes;
  protected $table = 'stocks';
  protected $fillable = ['id', 'product_id', 'supplier_id', 'price', 'created_at', 'updated_at', 'deleted_at'];
}
