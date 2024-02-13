<?php

namespace App\Services;



    /*
     * Class BankService
     * @package App\Services
     * */

use App\Models\Seller;


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


