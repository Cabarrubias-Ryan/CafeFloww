<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use SoftDeletes;
  protected $table = 'product';
  protected $fillable = [
    'id',
    'product_code',
    'name',
    'description',
    'discount',
    'category',
    'picture',
    'created_at',
    'updated_at',
    'deleted_at',
  ];
}
