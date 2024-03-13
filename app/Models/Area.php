<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Area extends Model
{
    use SoftDeletes;

    protected $fillable =[
        'city_id','name'
    ];

    public function cities()
    {
        return $this->hasOne(City::class, 'id','city_id');
    }
}
