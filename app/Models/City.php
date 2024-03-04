<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;
    protected $fillable =[
        'province_id','name'
    ];

    public function provinces()
    {
        return $this->hasOne(province::class, 'id','province_id');
    }
}
