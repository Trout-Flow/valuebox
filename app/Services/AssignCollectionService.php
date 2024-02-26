<?php

namespace App\Services;



    /*
     * Class tblbanksService
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


    public function search($param)
    {
        $q = AssignCollection::query();
        if (!empty($param['seller_id']))
        {
            $q->where('seller_id', 'LIKE', '%'. $param['seller_id'] . '%');
        }

        $assignCollections = $q->orderBy('seller_id', 'ASC')->paginate(config('constants.PER_PAGE'));
        return $assignCollections;
    }

}
