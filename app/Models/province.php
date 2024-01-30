<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class province extends Model
{
    use HasFactory;
    protected $fillable =[
        'country_id','name'
    ];
    public function countries()
    {
        return $this->hasOne(countries::class, 'id','country_id');
    }
}
