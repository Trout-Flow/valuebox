<?php

namespace App\Services;



    /*
     * Class tblbanksService
     * @package App\Services
     * */

use App\Models\collection;
use App\Models\countries;
use Illuminate\Support\Facades\Input;

    class CollectionService
{
    const COLLECTION_SAVED = 'Collection save successfully';
    const COLLECTION_UPDATED = 'Collection updated successfully';
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
    public function search($param)
    {
        $q = collection::query();
        if (!empty($param['name']))
        {
            $q->where('name', 'LIKE', '%'. $param['name'] . '%');
        }

        $collections = $q->orderBy('name', 'ASC')->paginate(Self::PER_PAGE);
        return $collections;
    }

}
