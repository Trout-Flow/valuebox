<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class City extends Model
{
    protected $fillable =[
        'province_id','name'
    ];

    public function provinces()
    {
        return $this->hasOne(province::class, 'id','province_id');
    }
}
