<?php

namespace App\Http\Controllers;

use App\Models\province;
use Illuminate\Http\Request;
use App\Services\ProvinceService;
use App\Http\Requests\provinceRequest;

class ProvincesController extends Controller
{
    protected $ProvinceService;

    public function __construct(ProvinceService $ProvinceService)
    {
        $this->ProvinceService =$ProvinceService;
    }

    public function index(Request $request)
    {
        $request = request()->all();
        $provinces = $this->ProvinceService->search($request);

        return view('provinces.index', compact('provinces'));
    }

    public function create()
    {
        $dropDownData = $this->ProvinceService->DropDownData();
       return view('provinces.create', compact('dropDownData'));
    }


    public function store(provinceRequest $request)
    {
        
        $data = $data = $request->except('_token','id');
        $this->ProvinceService->findUpdateOrCreate(province::class, ['id'=>''], $data);
        return redirect('province/list')->with('message', ProvinceService::PROVINCE_SAVED);
    }

    public function edit($id)
    {

        $province = province::find($id);
        $dropDownData = $this->ProvinceService->DropDownData();
        if(empty($province)){
            abort(404);
        }
        return view('provinces.create', compact('province', 'dropDownData'));

    }

    public function update(provinceRequest $request){
        $request = $request->except('_token','id');
        $this->ProvinceService->findUpdateOrCreate(province::class, ['id' => request('id')], $request);
        return redirect('province/list')->with('message', ProvinceService::PROVINCE_UPDATED);
    }

    public function destroy($id)
    {
        $deleted = province::destroy($id);
        if($deleted){
            return redirect()->route('province.list')->with('error','Province Deleted successfully.');
        }else{
            return response()->json(['error'=>'', 'message'=>'Province not deleted']);
        }
    }

}
