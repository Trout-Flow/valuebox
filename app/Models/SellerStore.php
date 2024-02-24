<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SellerStore extends Model
{
    use SoftDeletes;
    protected $fillable = ['store_name', 'address', 'vacation_mode', 'start_date',
    'end_date', 'seller_id','country_id', 'province_id',
    'city_id','area_id'];

    public function seller_id()
    {
        return $this->hasOne(Seller::class, 'id','seller_id');
    }
    public function country_id()
    {
        return $this->hasOne(countries::class, 'id','country_id');
    }

    public function city_id()
    {
        return $this->hasOne(City::class, 'id','city_id');
    }
    public function area_id()
    {
        return $this->hasOne(Area::class, 'id','area_id');
    }
    
    public function province_id()
    {
        return $this->hasOne(province::class, 'id','province_id');
    }
}
