<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssignCollection extends Model
{
    use SoftDeletes;
    protected $table = 'assign_collecion_to_sellers';
    protected $fillable =[
        'seller_id','name'
    ];
    public function sellers()
    {
        return $this->hasOne(Seller::class, 'id','seller_id');
    }
}
