<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Seller;
use App\Models\province;
use App\Models\countries;
use Illuminate\Http\Request;
use App\Services\CommonService;
use App\Services\SellerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Services\UploadFileService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreSellerRequest;
use App\Models\Area;

class SellerController extends Controller
{
    private $sellerService;
    private $commonService;
    protected $uploadService;

    public function __construct(SellerService $sellerService, CommonService $commonService, UploadFileService $uploadService)
    {
        $this->sellerService = $sellerService;
        $this->commonService = $commonService;
        $this->uploadService = $uploadService;
    }

    public function index()
    {
        $request = request()->all();
        $sellers = $this->sellerService->searchSeller($request);

        return view('seller.index', compact('sellers'));
    }


    public function create()
    {
        $data['countries'] = countries::get(["name", "id"]);
        $dropDownData = $this->sellerService->DropDownData();
        return view('seller.create', $data,  compact('dropDownData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(StoreSellerRequest $request)
    {
        $request->validate([
            'bank_check' => 'nullable|mimes:png,jpg,jpeg'
        ]);
        dd($request);
        $data = $request->except('_token', 'id');
        $sellerData = $this->sellerService->prepareSellerData($request);
        $sellerInsert = $this->commonService->findUpdateOrCreate(Seller::class, ['id' => ''], $sellerData);
        $sellerStoreData = $this->sellerService->prepareSellerStoreData($request, $sellerInsert->id);
        $this->sellerService->saveSellerStore($sellerStoreData);
        $sellerPaymentData = $this->sellerService->prepareSellerPaymentData($request, $sellerInsert->id);
        $this->sellerService->saveSellerPaymentData($sellerPaymentData);
        //$this->sellerService->findUpdateOrCreate(Seller::class, ['id' => !empty(request('id')) ? request('id') : null], $data);
        $message = config(
            'constants.add'
        );
        if (request('id')) {
            $message = config('constants.update');
        }
        session()->flash('message', $message);
        return redirect('seller/list');
    }


    public function edit($id)
    {
        $dropDownData = $this->sellerService->DropDownData();
        $seller = Seller::find($id);
        return view('seller.edit', compact('seller', 'dropDownData'));
    }


    public function destroy()
    {
        return $this->commonService->deleteResource(Seller::class);
    }

    public function fetchProvince(Request $request): JsonResponse
    {
        $data['provinces'] = province::where("country_id", $request->country_id)
            ->get(["name", "id"]);

        return response()->json($data);
    }

    public function fetchCity(Request $request): JsonResponse
    {
        $data['cities'] = City::where("province_id", $request->province_id)
            ->get(["name", "id"]);
        $data['areas'] = Area::where("city_id", $request->city_id)
            ->get(["name", "id"]);

        return response()->json($data);
    }

    public function fetchArea(Request $request): JsonResponse
    {
        $data['areas'] = Area::where("city_id", $request->city_id)
            ->get(["name", "id"]);

        return response()->json($data);
    }
}
