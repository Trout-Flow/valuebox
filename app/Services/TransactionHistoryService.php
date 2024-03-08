<?php

namespace App\Services;
/*
     * Class TransactionHistoryService
     * @package App\Services
     * */

use App\Models\TransactionHistory;
use Illuminate\Support\Facades\Input;

class TransactionHistoryService
{

    public function search($request)
    {
        $q = TransactionHistory::query();
        if (!empty($request['param'])) {
            $q->where('date', 'LIKE', '%' . $request['param'] . '%');
        }

        $transactionHistories = $q->orderBy('id', 'ASC')->paginate(config('constants.PER_PAGE'));
        return $transactionHistories;
    }
}
