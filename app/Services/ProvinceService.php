<?php

namespace App\Services;
/*
* Class tblbanksService
* @package App\Services
*
*/

use App\Models\countries;
use App\Models\province;
use Illuminate\Support\Facades\Input;

class ProvinceService
{
    protected $commonService;

    public function __construct(CommonService $commonService)
    {
        $this->commonService = $commonService;
    }
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
            'country' => Countries::pluck('name', 'id'),

        ];

        return $result;
    }

    // public function search($request)
    // {
    //     $provinces = [];
    //     if (!empty($request['param'])) {
    //         $query = province::with('countries')->where('name', 'like', '%' . $request['param'] . '%');
    //         $provinces = $query->get();
    //     } else {
    //         $provinces = province::get();
    //     }

    //     return $this->commonService->paginate($provinces, config('constants.PER_PAGE'));
    // }

    public function search($request)
    {
        $q = province::query();
        if (!empty($request['name']))
        {
            $q->with('countries')->where('name', 'LIKE', '%'. $request['name'] . '%');
        }

        $provinces = $q->orderBy('id', 'ASC')->paginate(config('constants.PER_PAGE'));
        return $provinces;
    }
}
