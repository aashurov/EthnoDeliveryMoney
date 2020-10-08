<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceTypeModel extends Model
{
    use HasFactory;
    protected $table = 'servicetype';
    protected $fillable = ['id','service_name'];
}
