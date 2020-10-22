<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanModel extends Model
{
    use HasFactory;
    protected $table = 'loan';
    protected $fillable = ['customer_id','customer_name','courier_id','usd','rub','uzs','type', 'branch', 'dategive','dateclose','status','description'];

}
