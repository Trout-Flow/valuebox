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

    // public function search($request)
    // {
    //     $countries = [];
    //     if (!empty($request['param'])) {
    //         $query = countries::where('name', 'like', '%' . $request['param'] . '%');
    //         $countries = $query->get();
    //     }else{
    //         $countries = countries::get();
    //     }

    //     return $this->commonService->paginate($countries, config('constants.PER_PAGE'));
    // }

    public function search($request)
    {
        $q = countries::query();
        if (!empty($request['name']))
        {
            $q->where('name', 'LIKE', '%'. $request['name'] . '%');
        }

        $countries = $q->orderBy('id', 'ASC')->paginate(config('constants.PER_PAGE'));
        return $countries;
    }

}
