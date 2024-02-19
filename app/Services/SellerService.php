<?php

namespace App\Services;



    /*
     * Class BankService
     * @package App\Services
     * */

use App\Models\Area;
use App\Models\City;
use App\Models\Seller;
use App\Models\countries;
use App\Models\province;

    // use Illuminate\Support\Facades\Input;

    class SellerService
{

    const PER_PAGE = 10;

    protected $commonService;

    public function __construct(CommonService $commonService)
    {
        $this->commonService = $commonService;
    }
    /*
    * Store company data.
    * @param $model
    * @param $where
    * @param $data
    *
    * @return object $object.
    * */
    public function findUpdateOrCreate($model, array $where, array $data)
    {
        $object = $model::firstOrNew($where);

        foreach ($data as $property => $value){
            $object->{$property} = $value;
        }
        $object->save();

        return $object;
    }

    public function DropDownData()
    {
        $result = [
            'countries' => countries::pluck('name','id'),
            'provinces' => province::pluck('name','id'),
            'cities' => City::pluck('name','id'),
            'areas' => Area::pluck('name','id'),
        ];

        return $result;
    }

    public function getcountry($country)
    {
        return countries::where('country', $country)->pluck('name', 'id');
    }

    public function searchSeller($request)
    {
        $sellers = [];
        if (!empty($request['param'])) {
            $query = Seller::where('name', 'like', '%' . $request['param'] . '%');
            $sellers = $query->get();
        }else{
            $sellers = Seller::get();
        }

        return $this->commonService->paginate($sellers , Self::PER_PAGE);
    }


}


