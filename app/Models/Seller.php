<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $fillable = ['name', 'shope_name', 'email', 'password',
    'confirm_password', 'cnic_no','bank_name', 'account_title',
    'account_no','delivery_type'];
}
