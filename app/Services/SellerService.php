<?php

namespace App\Services;



    /*
     * Class BankService
     * @package App\Services
     * */

use App\Models\Area;
use App\Models\Bank;
use App\Models\City;
use App\Models\Seller;
use App\Models\province;
use App\Models\countries;
use App\Models\SellerPaymentDetails;
use App\Models\SellerStore;
use Illuminate\Support\Facades\Auth;

    // use Illuminate\Support\Facades\Input;

    class SellerService
{
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
            'banks' => Bank::pluck('name','id')
        ];

        return $result;
    }

     /*
     * Prepare Seller data.
     * @param: $request
     * @return Array
     * */
    public function prepareSellerData($request)
    {
        if($request->has('cnic_front')){
            $file = $request->file('cnic_front');
            $extension = $file->getClientOriginalExtension();
            $path ='resources/images/sellers/';
            $filename = time().'.'.$extension;
            $file->move($path, $filename);
        }
        if($request->has('cnic_back')){
            $file = $request->file('cnic_back');
            $extension = $file->getClientOriginalExtension();
            $path ='resources/images/sellers/';
            $filename = time().'.'.$extension;
            $file->move($path, $filename);
        }
        if($request->has('logo')){
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $path ='resources/images/sellers/';
            $filename = time().'.'.$extension;
            $file->move($path, $filename);
        }


        return [
            'name' => $request['name'],
            'mobile_number'=> $request['mobile_number'],
            'email'=> $request['email'],
            'password'=> $request['password'],
            'confirm_password'=> $request['confirm_password'],
           'cnic_no'=> $request['cnic_no'],
            'cnic_front'=> $path.$filename,
            'cnic_back'=> $path.$filename,
            'logo'=> $path.$filename,
            'delivery_type'=> $request['delivery_type'],
            'commision'=> $request['commision'],
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id
        ];
    }



    public function prepareSellerStoreData($request)
    {
        return [
            'name' => $request['name'],
            'address'=> $request['address'],
            'vacation_mode'=> $request['vacation_mode'],
           'start_date'=> $request['start_date'],
            'end_date'=> $request['end_date'],
            'seller_id'=> $request['seller_id'],
            'country_id' => $request['country_id'],
            'province_id'=> $request['province_id'],
            'city_id' => $request['city_id'],
            'area_id'=> $request['area_id'],
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id
        ];
    }


    /*
     * Save Seller Store.
     * @param: $data
     * */
    public function saveSellerStore($data)
    {
        foreach ($data['name'] as $key => $value) {
            if (!empty($data['name'][$key])) {
                $rec['name'] = $data['name'][$key];
                $rec['address'] = $data['address'][$key];
                $rec['vacation_mode'] = $data['vacation_mode'][$key];
                $rec['start_date'] = $data['start_date'][$key];
                $rec['end_date'] = $data['end_date'][$key];
                $rec['country_id'] = $data['country_id'][$key];
                $rec['province_id'] = $data['province_id'][$key];
                $rec['city_id'] = $data['city_id'][$key];
                $rec['area_id'] = $data['area_id'][$key];
                $rec['created_by'] = Auth::user()->id;
                $rec['updated_by'] = Auth::user()->id;
                $rec['seller_id'] = $data['seller_id'];
                SellerStore::create($rec);
            }
        }
    }

    public function prepareSellerPaymentData($request)
    {
        if($request->has('bank_check')){
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $path ='resources/images/sellers/';
            $filename = time().'.'.$extension;
            $file->move($path, $filename);
        }
        return [
            'account_title' => $request['account_title'],
            'iban_number'=> $request['iban_number'],
            'bank_check'=> $path.$filename,
            'seller_id'=> $request['seller_id'],
            'bank_id' => $request['bank_id'],
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id
        ];
    }


    /*
     * Save Seller Store.
     * @param: $data
     * */
    public function saveSellerPaymentData($data)
    {
        foreach ($data['account_title'] as $key => $value) {
            if (!empty($data['account_title'][$key])) {
                $rec['account_title'] = $data['account_title'][$key];
                $rec['iban_number'] = $data['iban_number'][$key];
                $rec['bank_check'] = $data['bank_check'][$key];
                $rec['seller_id'] = $data['seller_id'][$key];
                $rec['bank_id'] = $data['bank_id'][$key];
                $rec['created_by'] = Auth::user()->id;
                $rec['updated_by'] = Auth::user()->id;
                SellerPaymentDetails::create($rec);
            }
        }
    }

    public function searchSeller($request)
    {
        $sellers = [];
        if (!empty($request['param'])) {
            $query = Seller::where('name', 'like', '%' . $request['param'] . '%');
            $sellers = $query->get();
        }else
        {
            $sellers = Seller::get();
        }

        return $this->commonService->paginate($sellers , config('constants.PER_PAGE'));
    }


}


