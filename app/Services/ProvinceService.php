<?php

namespace App\Services;



    /*
     * Class tblbanksService
     * @package App\Services
     * */
use App\Models\countries;
use App\Models\province;
use Illuminate\Support\Facades\Input;

    class ProvinceService
{
    const PROVINCE_SAVED = 'Province save successfully';
    const PROVINCE_UPDATED = 'Province updated successfully';
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
            'country' => Countries::pluck('name','id'),

        ];

        return $result;
    }


    public function search($param)
    {
        $q = province::query();
        if (!empty($param['name']))
        {
            $q->where('name', 'LIKE', '%'. $param['name'] . '%');
        }

        $countries = $q->orderBy('name', 'ASC')->paginate(Self::PER_PAGE);
        return $countries;
    }

}
