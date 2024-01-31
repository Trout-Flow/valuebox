<?php

namespace App\Services;



    /*
     * Class tblbanksService
     * @package App\Services
     * */
use App\Models\countries;
use Illuminate\Support\Facades\Input;

    class CountryService
{

    protected $commonService;

    public function __construct(CommonService $commonService)
    {
        $this->commonService = $commonService;
    }
    const COUNTRY_SAVED = 'Country save successfully';
    const COUNTRY_UPDATED = 'Country updated successfully';
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
    // public function search($param)
    // {
    //     $q = countries::query();
    //     if (!empty($param['name']))
    //     {
    //         $q->where('name', 'LIKE', '%'. $param['name'] . '%');
    //     }

    //     $countries = $q->orderBy('name', 'ASC')->paginate(Self::PER_PAGE);
    //     return $countries;
    // }

    public function search($request)
    {
        $countries = [];
        if (!empty($request['param'])) {
            $query = countries::where('name', 'like', '%' . $request['param'] . '%');
            $countries = $query->get();
        }else{
            $countries = countries::get();
        }

        return $this->commonService->paginate($countries, Self::PER_PAGE);
    }
}
