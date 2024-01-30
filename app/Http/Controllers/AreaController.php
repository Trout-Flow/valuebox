<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AreaRequest;
use App\Models\Area;
use App\Services\AreaService;

class AreaController extends Controller
{

    protected $AreaService;
    public function __construct(AreaService $AreaService)
    {
        $this->AreaService =$AreaService;
    }

    public function index(Request $request)
    {
        $areas = $this->AreaService->search($request->all());
        $name = $request['name'];
        return view('Areas.index', compact('areas', 'name'));
    }

    public function create()
    {

       return view('Areas.create');
    }


    public function store(AreaRequest $request)
    {
        $data = $data = $request->except('_token','id');
        $this->AreaService->findUpdateOrCreate(Area::class, ['id'=>''], $data);
        return redirect('area/list')->with('message', AreaService::AREA_SAVED);
    }

    public function edit($id)
    {
        $area = Area::find($id);

        if(empty($area)){
            abort(404);
        }
        return view('Areas.create', compact('area'));

    }

    public function update(AreaRequest $request){
        $request = $request->except('_token','id');
        $this->AreaService->findUpdateOrCreate(Area::class, ['id' => request('id')], $request);
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
