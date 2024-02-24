<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seller extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'mobile_number', 'email', 'password',
    'confirm_password', 'cnic_no','cnic_front', 'cnic_back','logo', 'commision' ,'delivery_type'];
}
