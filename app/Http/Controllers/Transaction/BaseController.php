<?php


namespace App\Http\Controllers\Transaction;


use App\Http\Controllers\Controller;
use App\Services\Transaction\Service;

class BaseController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
