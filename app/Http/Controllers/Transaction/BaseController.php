<?php


namespace App\Http\Controllers\Transaction;


use App\Http\Controllers\API;
use App\Services\Transaction\Service;

class BaseController extends API\BaseController
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

}
