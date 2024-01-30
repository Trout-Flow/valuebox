<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CollectionService;
use App\Http\Requests\CollectionRequest;
use App\Models\collection;

class CollectionsController extends Controller
{

    protected $CollectionService;

    public function __construct(CollectionService $CollectionService)
    {
        $this->CollectionService =$CollectionService;
    }

    public function index(Request $request)
    {
        $collections = $this->CollectionService->search($request->all());
        $name = $request['name'];
        return view('collections.index', compact('collections', 'name'));
    }
    public function create()
    {

       return view('collections.create');
    }


    public function store(CollectionRequest $request)
    {
        $data = $data = $request->except('_token','id');
        $this->CollectionService->findUpdateOrCreate(collection::class, ['id'=>''], $data);
        return redirect('collection/list')->with('message', CollectionService::COLLECTION_SAVED);
    }

    public function edit($id)
    {
        $collection = collection::find($id);

        if(empty($collection)){
            abort(404);
        }
        return view('collections.create', compact('collection'));

    }

    public function update(CollectionRequest $request){
        $request = $request->except('_token','id');
        $this->CollectionService->findUpdateOrCreate(collection::class, ['id' => request('id')], $request);
        return redirect('collection/list')->with('message', CollectionService::COLLECTION_UPDATED);
    }

    public function destroy($id)
    {
        $deleted = collection::destroy($id);
        if($deleted){
            return redirect()->route('collection.list')->with('error','Collection Deleted successfully.');
        }else{
            return response()->json(['error'=>'', 'message'=>'Collection not deleted']);
        }
    }
}
