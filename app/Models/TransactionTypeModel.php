<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionTypeModel extends Model
{
    use HasFactory;
    protected $table = 'transactiontype';
    protected $fillable = ['id','transactiontype'];
}
