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
        $provinces = $this->ProvinceService->search($request->all());
        $name = $request['name'];
        return view('province.index', compact('provinces', 'name'));
    }
    public function create()
    {

       return view('province.create');
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

        if(empty($province)){
            abort(404);
        }
        return view('countries.create', compact('province'));

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
