<?php

namespace App\Http\Controllers\Employee;

use App\Http\Requests\Employee\UpdateRequest;
use App\Models\Employee;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Employee $employee)
    {
        $data = $request->validated();
        $this->service->update($employee, $data);
        return $employee;
    }

}
