<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Requests\Transaction\StoreRequest;
use App\Models\Transaction;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('transactions.index');
    }

}
