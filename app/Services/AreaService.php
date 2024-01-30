<?php

namespace App\Services;



    /*
     * Class tblbanksService
     * @package App\Services
     * */

use App\Models\Area;
use App\Models\City;
use App\Models\countries;
use Illuminate\Support\Facades\Input;

    class AreaService
{
    const AREA_SAVED = 'Area save successfully';
    const AREA_UPDATED = 'Area updated successfully';
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
            'city' => City::pluck('name','id'),
        ];

        return $result;
    }


    public function search($param)
    {
        $q = Area::query();
        if (!empty($param['name']))
        {
            $q->where('name', 'LIKE', '%'. $param['name'] . '%');
        }

        $Areas = $q->orderBy('name', 'ASC')->paginate(Self::PER_PAGE);
        return $Areas;
    }

}
