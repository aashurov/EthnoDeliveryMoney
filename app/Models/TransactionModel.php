<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionModel extends Model
{
    use HasFactory;
    protected $table = 'transaction';
    protected $fillable = ['customer_id','usd','rub','uzs','type','transactiontype','datecreate','description'];
}
