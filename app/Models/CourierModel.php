<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourierModel extends Model
{
    use HasFactory;
    protected $table = 'courier';
    protected $fillable = ['id','flname','phone_number'];
}
