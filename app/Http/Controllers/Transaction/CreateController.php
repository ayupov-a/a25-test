<?php

namespace App\Http\Controllers\Transaction;

class CreateController extends BaseController
{
    public function __invoke(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('transaction.create');
    }

}
