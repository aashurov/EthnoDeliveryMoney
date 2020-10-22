<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    use HasFactory;
    protected $table = 'customer';
    protected $fillable = ['id','imageavatar','imagepassport','imagepassportt','c_id','flname','phone_number', 'addressmain','addresssecond','dategive','expirationdate','issuedby'];
}
