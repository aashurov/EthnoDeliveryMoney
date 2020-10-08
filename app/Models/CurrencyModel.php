<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyModel extends Model
{
    use HasFactory;
    protected $table = 'currency';
    protected $fillable = ['id','rub_usd','rub_uzs', 'uzs_usd'];
}
