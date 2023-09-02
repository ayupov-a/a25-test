<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Requests\Transaction\UpdateRequest;

class UpdateController extends BaseController
{
    public function __invoke($transaction_id)
    {
        $this->service->pay($transaction_id);
        $transactions = $this->service->index();
        return redirect()->route('transactions.index', compact('transactions'));
    }

}
