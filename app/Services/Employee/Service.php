<?php


namespace App\Services\Employee;


use App\Models\Employee;

class Service
{

    public function store($data)
    {
        return Employee::create($data);
    }
    public function update($employee, $data)
    {
        $employee->update($data);
    }
}
