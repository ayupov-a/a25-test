<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Requests\Transaction\UpdateRequest;
use Illuminate\Support\Facades\Auth;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, $transaction_id)
    {
        $this->service->pay($transaction_id);
        if (Auth::getDefaultDriver() === 'web') {
            $transactions = $this->service->index();
            return redirect()->route('transactions.index', compact('transactions'));
        } else {
            return $this->sendResponse([], 'Transactions paid out');
        }
    }

}
