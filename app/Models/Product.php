<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use SoftDeletes;
  protected $table = 'product';
  protected $fillable = ['id', 'product_code', 'name', 'description', 'created_at', 'updated_at', 'deleted_at'];
}
