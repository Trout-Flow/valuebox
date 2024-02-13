<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AreaRequest;
use App\Models\Area;
use App\Services\AreaService;
use App\Services\CommonService;

class AreaController extends Controller
{
    protected $commonService;
    protected $areaService;
    public function __construct(AreaService $areaService, CommonService $commonService)
    {
        $this->areaService =$areaService;
        $this->commonService =$commonService;
    }

    public function index(Request $request)
    {
        $request = request()->all();
        $areas = $this->areaService->search($request);
        return view('Areas.index', compact('areas'));
    }

    public function create()
    {
        $dropDownData = $this->areaService->DropDownData();
       return view('Areas.create', compact('dropDownData'));
    }


    public function store(AreaRequest $request)
    {

        $data = $data = $request->except('_token','id');
        $this->areaService->findUpdateOrCreate(Area::class, ['id'=>''], $data);
        $message = config('constants.add');
        if(request('id')){
            $message = config('constants.update');
        }
        session()->flash('message', $message);
        return redirect('area/list')->with('message', config('constants.add'));
    }

    public function edit($id)
    {
        $dropDownData = $this->areaService->DropDownData();
        $area = Area::find($id);

        if(empty($area)){
            abort(404);
        }
        return view('Areas.create', compact('area','dropDownData'));

    }

    public function update(AreaRequest $request){
        $request = $request->except('_token','id');
        $this->areaService->findUpdateOrCreate(Area::class, ['id' => request('id')], $request);
        $message = config('constants.update');
        session()->flash('message', $message);
        return redirect('area/list')->with('message', config('constants.update'));
    }

    public function destroy()
    {
        return $this->commonService->deleteResource(Area::class);
    }

}
