<?php

namespace App\Services;



    /*
     * Class tblbanksService
     * @package App\Services
     * */

use App\Models\Area;
use App\Models\City;
use App\Models\countries;
use Illuminate\Support\Facades\Input;

    class AreaService
{
    const AREA_SAVED = 'Area save successfully';
    const AREA_UPDATED = 'Area updated successfully';
    const PER_PAGE = '10';

    public function findUpdateOrCreate($model, array $where, array $data)
    {
       $object = $model::firstOrNew($where);
        foreach ($data as $property => $value) {
            $object->{$property} = $value;
        }
        $object->save();
        return $object;
    }

    public function DropDownData()
    {
        $result = [
            'cities' => City::pluck('name','id'),
        ];

        return $result;
    }


    public function search($request)
    {
        $q = Area::query();
        if (!empty($request['param']))
        {
            $q->with('cities')->where('name', 'LIKE', '%'. $request['param'] . '%');
        }

        $areas = $q->orderBy('id', 'ASC')->paginate(config('constants.PER_PAGE'));
        return $areas;
    }

    public function deleteResource($modelClass)
    {
        $deleted = $modelClass::destroy(request()->id);
        if ($deleted) {
            $message = config('constants.delete') ;
            session()->flash('message', $message);
            return redirect('area/list')->with('message', config('constants.delete'));
            // return response()->json(['status' => 'success', 'message' => $message]);
        } else {
            $message = config('constants.wrong') ;
            session()->flash('message', $message);
            return redirect('area/list')->with('message', config('constants.wrong'));
        }
    }

}
