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
    protected $commonService;

    public function __construct(CommonService $commonService)
    {
        $this->commonService = $commonService;
    }
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

    // public function search($request)
    // {
    //     $cities = [];
    //     if (!empty($request['param'])) {
    //         $query = City::with('province')->where('name', 'like', '%' . $request['param'] . '%');
    //         $cities = $query->get();
    //     }else{
    //         $cities = City::get();
    //     }

    //     return $this->commonService->paginate($cities, config('constants.PER_PAGE'));
    // }

    public function search($request)
    {
        $q = City::query();
        if (!empty($request['name']))
        {
            $q->with('province')->where('name', 'LIKE', '%'. $request['name'] . '%');
        }

        $cities = $q->orderBy('id', 'ASC')->paginate(config('constants.PER_PAGE'));
        return $cities;
    }

}
