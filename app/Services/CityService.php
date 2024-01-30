<?php

namespace App\Services;

    /*
     * Class tblbanksService
     * @package App\Services
     * */

use App\Models\City;
use App\Models\province;

    class CityService
{
    const CITY_SAVED = 'City save successfully';
    const CITY_UPDATED = 'City updated successfully';
    const PER_PAGE = '10';

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
            'province' => province::pluck('name','id'),
        ];

        return $result;
    }


    public function search($param)
    {
        $q = City::query();
        if (!empty($param['name']))
        {
            $q->where('name', 'LIKE', '%'. $param['name'] . '%');
        }

        $countries = $q->orderBy('name', 'ASC')->paginate(Self::PER_PAGE);
        return $countries;
    }

}
