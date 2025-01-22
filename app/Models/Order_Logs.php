<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_Logs extends Model
{
  protected $table = 'order_logs';
  protected $fillable = ['id', 'cash', 'amount', 'change', 'date', 'costumer_id'];
}
