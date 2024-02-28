<?php

namespace App\Http\Controllers;

use App\Models\countries;
use App\Models\SellerStore;
use Illuminate\Http\Request;
use App\Services\CommonService;
use App\Services\SellerStoreService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SellerStoreRequest;

class SellerStoreController extends Controller
{
    protected $commonService;
    protected $sellerStoreService;
    public function __construct(SellerStoreService $sellerStoreService, CommonService $commonService)
    {
        $this->sellerStoreService =$sellerStoreService;
        $this->commonService =$commonService;
    }

    public function index(Request $request)
    {
        $request = request()->all();
        $sellerStores = $this->sellerStoreService->search($request);
        return view('seller-store-location.index', compact('sellerStores'));
    }

    public function create()
    {
        $data['countries'] = countries::get(["name", "id"]);
        $dropDownData = $this->sellerStoreService->DropDownData();
        return view('seller-store-location.create',$data, compact('dropDownData'));
    }


    public function store(SellerStoreRequest $request)
    {

        $data = $data = $request->except('_token','id');
        $data['created_by'] = Auth::user()->id;
        $data['updated_by'] = Auth::user()->id;
        $this->sellerStoreService->findUpdateOrCreate(SellerStore::class, ['id'=>''], $data);
        $message = config('constants.add');
        if(request('id')){
            $message = config('constants.update');
        }
        session()->flash('message', $message);
        return redirect('sellerStore/list')->with('message', config('constants.add'));
    }

    public function edit($id)
    {
        $dropDownData = $this->sellerStoreService->DropDownData();
        $sellerStore = SellerStore::find($id);

        if(empty($sellerStore)){
            abort(404);
        }
        return view('seller-store-location.create', compact('sellerStore','dropDownData'));

    }

    // public function update(SellerStoreRequest $request){
    //     $request = $request->except('_token','id');
    //     $this->sellerStoreService->findUpdateOrCreate(SellerStore::class, ['id' => request('id')], $request);
    //     $message = config('constants.update');
    //     session()->flash('message', $message);
    //     return redirect('sellerStore/list')->with('message', config('constants.update'));
    // }

    public function destroy()
    {
        return $this->commonService->deleteResource(SellerStore::class);
    }

}
