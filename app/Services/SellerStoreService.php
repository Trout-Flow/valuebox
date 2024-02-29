<?php

namespace App\Services;
    /*
     * Class tblbanksService
     * @package App\Services
     * */

use App\Models\Area;
use App\Models\City;
use App\Models\province;
use App\Models\countries;
use App\Models\Seller;
use App\Models\SellerStore;
use Illuminate\Support\Facades\Input;

    class SellerStoreService
{
    public function findUpdateOrCreate($model, array $where, array $data)
    {
       $object = $model::firstOrNew($where);
        foreach ($data as $property => $value) {
            $object->{$property} = $value;
        }
        $object->save();
        return $object;
    }

    public function DropDownData()
    {
        $result = [
            'sellers' => Seller::pluck('name','id'),
            'countries' => countries::pluck('name','id'),
            'provinces' => province::pluck('name','id'),
            'cities' => City::pluck('name','id'),
            'areas' => Area::pluck('name','id'),
        ];

        return $result;
    }

    public function search($request)
    {
        $q = SellerStore::query();
        if (!empty($request['store_name']))
        {
            $q->with('seller_id')->with('country_id')->with('city_id')->with('area_id')->with('province_id')
            ->where('store_name', 'LIKE', '%'. $request['store_name'] . '%');
        }

        $sellerStores = $q->orderBy('store_name', 'ASC')->paginate(config('constants.PER_PAGE'));
        return $sellerStores;
    }


}
