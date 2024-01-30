<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AreaRequest;
use App\Models\Area;
use App\Services\AreaService;

class AreaController extends Controller
{

    protected $areaService;
    public function __construct(AreaService $areaService)
    {
        $this->areaService =$areaService;
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
        return redirect('area/list')->with('message', AreaService::AREA_SAVED);
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
        return redirect('area/list')->with('message', AreaService::AREA_UPDATED);
    }

    public function destroy($id)
    {
        $deleted = Area::destroy($id);
        if($deleted){
            return redirect()->route('area.list')->with('error','Area Deleted successfully.');
        }
        else
        {
            return response()->json(['error'=>'', 'message'=>'Area not deleted']);
        }
    }

}
