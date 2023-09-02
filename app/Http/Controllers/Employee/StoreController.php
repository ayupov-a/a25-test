<?php

namespace App\Http\Controllers\Employee;

use App\Http\Requests\Employee\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $data = request()->validated();

        $this->service->store($data);

        return view("home");
    }

}
