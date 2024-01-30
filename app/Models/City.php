<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable =[
        'province_id','name'
    ];
    public function provinces()
    {
        return $this->hasOne(province::class, 'id','province_id');
    }
}
