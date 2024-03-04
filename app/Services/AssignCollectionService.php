<?php

namespace App\Services;



    /*
     * Class assignCollectionsService
     * @package App\Services
     * */

use App\Models\AssignCollection;
use App\Models\Seller;
use Illuminate\Support\Facades\Input;

    class AssignCollectionService
{


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
            'sellers' => Seller::pluck('name','id'),
        ];

        return $result;
    }


    public function search($request)
    {
        $q = AssignCollection::query();
        if (!empty($request['seller_id']))
        {
            $q->with('sellers')->where('seller_id', 'LIKE', '%'. $request['seller_id'] . '%');
        }

        $assignCollections = $q->orderBy('seller_id', 'ASC')->paginate(config('constants.PER_PAGE'));
        return $assignCollections;
    }

    public function deleteResource($modelClass)
    {
        $deleted = $modelClass::destroy(request()->id);
        if ($deleted) {
            $message = config('constants.delete') ;
            session()->flash('message', $message);
            return redirect('assignCollection/list')->with('message', config('constants.delete'));
            // return response()->json(['status' => 'success', 'message' => $message]);
        } else {
            $message = config('constants.wrong') ;
            session()->flash('message', $message);
            return redirect('assignCollection/list')->with('message', config('constants.wrong'));
        }
    }

}
