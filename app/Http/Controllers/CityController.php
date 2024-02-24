<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\province;
use Illuminate\Http\Request;
use App\Services\CityService;
use App\Http\Requests\CityRequest;
use Illuminate\Support\Facades\Auth;

class CityController extends Controller
{
    protected $CityService;
    public function __construct(CityService $CityService)
    {
        $this->CityService = $CityService;
    }

    public function index(Request $request)
    {
        $request = request()->all();

        $cities = $this->CityService->search($request);

        return view('cities.index', compact('cities'));
    }

    public function create()
    {
        $dropDownData = $this->CityService->DropDownData();
        return view('cities.create', compact('dropDownData'));
    }


    public function store(CityRequest $request)
    {

        $data = $data = $request->except('_token', 'id');
        $data['created_by'] = Auth::user()->id;
        $data['updated_by'] = Auth::user()->id;
        $this->CityService->findUpdateOrCreate(City::class, ['id' => ''], $data);
        return redirect('city/list')->with('message', config('constants.add'));
    }

    public function edit($id)
    {
        $city = City::find($id);
        $dropDownData = $this->CityService->DropDownData();
        if (empty($city)) {
            abort(404);
        }
        return view('cities.create', compact('city', 'dropDownData'));
    }

    public function update(CityRequest $request)
    {
        $request = $request->except('_token', 'id');
        $this->CityService->findUpdateOrCreate(City::class, ['id' => request('id')], $request);
        return redirect('city/list')->with('message', config('constants.update'));
    }

    public function destroy($id)
    {
        $deleted = City::destroy($id);
        if ($deleted) {
            $message = config('constants.delete') ;
            session()->flash('message', $message);
            return redirect('city/list')->with('message', config('constants.delete'));
        } else {
            $message = config('constants.wrong') ;
            session()->flash('message', $message);
            return redirect('city/list')->with('message', config('constants.wrong'));
        }
    }
}
