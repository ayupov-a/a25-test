<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Requests\Transaction\StoreRequest;
use App\Http\Resources\Transaction\IndexResource;
use Illuminate\Support\Facades\Auth;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $transaction = $this->service->store($data);
        if (Auth::getDefaultDriver() === 'web') {
            return redirect()->route('transactions.index');
        } else {
            return $this->sendResponse(new IndexResource($transaction), 'Transaction created');
        }
    }
}
