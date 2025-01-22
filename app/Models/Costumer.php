<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
  use SoftDeletes;
  protected $table = 'costumer';
  protected $fillable = ['id', 'costumer_code', 'created_at', 'updated_at', 'deleted_at'];
}
