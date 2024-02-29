<?php


namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class CommonService
{
    /**
     * create or Update content group
     * @param array $model
     * @param array $where
     * @param array $data
     * @return object $object.
     */
    public function findUpdateOrCreate( $model , array $where, array $data)
    {
        $object = $model::firstOrNew($where);
        foreach ($data as $property => $value) {
            $object->{$property} = $value;
        }
        $object->save();

        return $object;
    }


    public function viewAttachment($fileName, $path, $redirectRoute)
    {
        $file = public_path($path . $fileName);
        if (file_exists($file) || !is_dir($fileName)) {
            $path = public_path($path. $fileName);
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename=' . $path);
            header('Content-Transfer-Encoding: binary');
            header('Accept-Ranges: bytes');

            readfile($path);
        } else {
            session()->flash('error', __('No file exists.'));
        }
    }

    /*
    * Pagination for list of packages.
    * @param: $data
    * @param: $perPage
    * @param: $page
    * @param: $options
    * */
    public function paginate($items, $perPage, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: config('constants.PER_PAGE'));
        $items = $items instanceof Collection ? $items : Collection::make($items)->sortByDesc('id');

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }


    public function deleteResource($modelClass)
    {
        $deleted = $modelClass::destroy(request()->id);
        if ($deleted) {
            $message = config('constants.delete');
            return response()->json(['status' => 'success', 'message' => $message]);
        } else {
            $message = config('constants.wrong');
            return response()->json(['status' => 'fail', 'message' => $message]);
        }
    }
}
