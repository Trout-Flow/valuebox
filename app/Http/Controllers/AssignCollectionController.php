<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommonService;
use App\Models\AssignCollection;
use Illuminate\Support\Facades\Auth;
use App\Services\AssignCollectionService;
use App\Http\Requests\AssignCollectionRequest;

class AssignCollectionController extends Controller
{
    protected $commonService;
    protected $assignCollectionService;
    public function __construct(AssignCollectionService $assignCollectionService, CommonService $commonService)
    {
        $this->assignCollectionService =$assignCollectionService;
        $this->commonService =$commonService;
    }

    public function index(Request $request)
    {
        $request = request()->all();
        $assignCollections = $this->assignCollectionService->search($request);
        return view('Assign-Collections.index', compact('assignCollections'));
    }

    public function create()
    {
        $dropDownData = $this->assignCollectionService->DropDownData();
        return view('Assign-Collections.create', compact('dropDownData'));
    }


    public function store(AssignCollectionRequest $request)
    {

        $data = $data = $request->except('_token','id');
        $data['created_by'] = Auth::user()->id;
        $data['updated_by'] = Auth::user()->id;
        $this->assignCollectionService->findUpdateOrCreate(AssignCollection::class, ['id'=>''], $data);
        $message = config('constants.add');
        if(request('id')){
            $message = config('constants.update');
        }
        session()->flash('message', $message);
        return redirect('assignCollection/list')->with('message', config('constants.add'));
    }

    public function edit($id)
    {
        $dropDownData = $this->assignCollectionService->DropDownData();
        $assignCollection = AssignCollection::find($id);

        if(empty($assignCollection)){
            abort(404);
        }
        return view('Assign-Collections.create', compact('area','dropDownData'));

    }

    // public function update(AssignCollectionRequest $request){
    //     $request = $request->except('_token','id');
    //     $this->assignCollectionService->findUpdateOrCreate(AssignCollection::class, ['id' => request('id')], $request);
    //     $message = config('constants.update');
    //     session()->flash('message', $message);
    //     return redirect('Assign-Collections/list')->with('message', config('constants.update'));
    // }

    public function destroy()
    {
        return $this->commonService->deleteResource(AssignCollection::class);
    }
}
