<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Resources\Transaction\IndexResource;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $transactions = $this->service->index();
        if (Auth::getDefaultDriver() === 'web') {
            return view("transaction.index", compact('transactions'));

        } else {
            return $this->sendResponse(IndexResource::collection(Transaction::all()), 'Transactions fetched');
        }

    }

}
