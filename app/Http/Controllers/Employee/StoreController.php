<?php

namespace App\Http\Controllers\Employee;

use App\Http\Requests\Employee\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
        return view("home");
    }

}
