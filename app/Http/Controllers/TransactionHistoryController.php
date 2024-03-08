<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TransactionHistoryService;

class TransactionHistoryController extends Controller
{
    protected $transactionHistoryService;
    public function __construct(TransactionHistoryService $transactionHistoryService)
    {
        $this->transactionHistoryService =$transactionHistoryService;
    }

    public function index(){
        $request = request()->all();
        $transactionHistories = $this->transactionHistoryService->search($request);
        return view('transaction-History.index', compact('transactionHistories'));
    }
}
