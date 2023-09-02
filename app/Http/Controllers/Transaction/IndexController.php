<?php

namespace App\Http\Controllers\Transaction;

use App\Models\Transaction;

class IndexController extends BaseController
{
    public function __invoke(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $transactions = $this->service->index();
        return view("transaction.index", compact('transactions'));
    }

}
