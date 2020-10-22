<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanTypeModel extends Model
{
    use HasFactory;
    protected $table = 'loantype';
    protected $fillable = ['id','type_name'];
}
