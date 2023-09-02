<?php

namespace App\Http\Controllers\Employee;

use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class IndexController extends BaseController
{
    public function __invoke(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $current_employee = Auth::user();
        $employees = Employee::all();
        return view("home", compact('current_employee', 'employees'));
    }

}
