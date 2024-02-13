<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Support\Str;
use App\Services\CommonService;
use App\Services\SellerService;
use App\Services\UploadFileService;
use App\Http\Requests\StoreSellerRequest;

class SellerController extends Controller
{
    private $sellerService;
    private $commonService;
    protected $uploadService;

    public function __construct(SellerService $sellerService, CommonService $commonService,UploadFileService $uploadService)
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
        return view('seller.create');
    }

    public function store(StoreSellerRequest $request)
    {
        dd($request);
        $data = $data = $request->except('_token','id');
        $this->sellerService->findUpdateOrCreate(Seller::class, ['id'=>''], $data);
        $message = config('constants.add');
        if(request('id')){
            $message = config('constants.update');
        }
        session()->flash('message', $message);
        return redirect('seller/list')->with('message', config('constants.add'));
    }


    // public function store(StoreSellerRequest $request)
    // {
    //     dd($request);
    //     // $data = $request->except('_token', 'id');
    //     // // if ($request->cnic) {
    //     // //     $fileName = Str::random(20) . '_' . '(' . $request->cnic->getClientOriginalName() . ')';
    //     // //     $data['cnic'] = $fileName;
    //     // // }
    //     // // $saved = $this->sellerService->findUpdateOrCreate(Seller::class, ['id' => !empty(request('id')) ? request('id') : null], $data);
    //     // // if ($saved && $request->file('cnic')) {
    //     // //     $this->uploadService->uploadSingleFile($request->cnic, $fileName, config('constants.file_upload.inventory'));
    //     // // }
    //     // if($request->has('cnic')){
    //     //     $file = $request->file('cnic');
    //     //     $extension = $file->getClientOriginalExtension();
    //     //     $path ='resources/images/sellers/';
    //     //     $filename = time().'.'.$extension;
    //     //     $file->move($path, $filename);


    //     // }
    //     // Seller::create([
    //     //     'name' => $request->name,
    //     //     'shope_name'=> $request->shope_name,
    //     //     'email'=> $request->email,
    //     //    'cnic_no'=> $request->cnic_no,
    //     //     'cnic'=> $path.$filename,
    //     //     'bank_check'=> $request->bank_check,
    //     //     'bank_name'=> $request->bank_name,
    //     //     'account_title'=> $request->account_title,
    //     //     'account_no' => $request->account_no,
    //     //     'delivery_type'=> $request->delivery_type,
    //     // ]);
    //     // $this->sellerService->findUpdateOrCreate(Seller::class, ['id' => !empty(request('id')) ? request('id') : null], $data);
    //     // $message = config(
    //     //     'constants.add'
    //     // );
    //     // if (request('id')) {
    //     //     $message = config('constants.update');
    //     // }
    //     // session()->flash('message', $message);
    //     // return redirect('seller/list');
    // }


    public function edit($id)
    {
        $seller = Seller::find($id);
        return view('seller.edit', compact('seller'));
    }


    public function destroy()
    {
        return $this->commonService->deleteResource(Seller::class);
    }
}
