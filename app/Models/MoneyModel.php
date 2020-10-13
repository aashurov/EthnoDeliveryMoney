<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoneyModel extends Model
{
    use HasFactory;
    protected $table = 'money';
    protected $fillable = ['customer_id','courier_id','usd','rub','uzs','type', 'branch', 'servicetype','description'];
}
