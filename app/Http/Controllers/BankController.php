<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;
use App\Services\BankService;
use App\Services\CommonService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBankRequest;

class BankController extends Controller
{
    private $bankService;
    private $commonService;

    public function __construct(BankService $bankService, CommonService $commonService)
    {
        $this->bankService = $bankService;
        $this->commonService = $commonService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = request()->all();
        $banks = $this->bankService->searchBank($request);

        return view('banks.index', compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBankRequest $request)
    {
        $data = $request->except('_token','id');
        $data['created_by'] = Auth::user()->id;
        $data['updated_by'] = Auth::user()->id;

        $this->bankService->findUpdateOrCreate(Bank::class, ['id'=>!empty(request('id')) ? request('id') : null], $data);
        $message = config(
            'constants.add'
        );
        if(request('id')){
            $message = config('constants.update');
        }
        session()->flash('message', $message);
        return redirect('bank/list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bank = Bank::find($id);
        return view('banks.create', compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $bank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function delete()
    {
        // return $this->bankService->deleteResource(Bank::class);
        return $this->commonService->deleteResource(Bank::class);
    }

     /**
     * Search record.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response.
     */
    public function search(Request $request)
    {
        $request = request()->all();
        $banks = $this->bankService->searchBank($request);

        return view('banks.index', compact('banks'));
    }
}
