<?php


namespace App\Services\Transaction;


use App\Models\Transaction;
use Carbon\Carbon;
use PhpParser\Node\NullableType;

class Service
{
    public function index()
    {
        return Transaction::where('is_payed')
            ->orderByDesc('created_at')
            ->paginate(10);
    }

    public function store($data)
    {
        Transaction::create($data);
    }

    public function update($transaction, $data)
    {
        $transaction->update($data);
    }

    public function pay($transaction_id)
    {
//        dd(Transaction::where('is_payed')->get());
        if ($transaction_id) {
            Transaction::find($transaction_id)
                ->update([
                    'is_payed' => Carbon::now(),
                ]);
        } else {
            $transactions = Transaction::where('is_payed')->get();
            foreach ($transactions as $transaction) {
                $transaction->update([
                    'is_payed' => Carbon::now(),
                ]);
            }
        }
    }
}
