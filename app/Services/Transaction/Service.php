<?php


namespace App\Services\Transaction;


use App\Models\Transaction;
use Carbon\Carbon;

class Service
{
    public function index()
    {
        return Transaction::where('is_paid')
            ->orderByDesc('created_at')
            ->paginate(10);
    }

    public function store($data)
    {
        return Transaction::create($data);
    }

    public function update($transaction, $data)
    {
        $transaction->update($data);
    }

    public function pay($transaction_id)
    {
        if ($transaction_id === "all") {
            $transactions = Transaction::where('is_paid')->get();
            foreach ($transactions as $transaction) {
                $transaction->update([
                    'is_paid' => Carbon::now(),
                ]);
            }
        } else {
            return Transaction::findOrFail($transaction_id)
                ->update([
                    'is_paid' => Carbon::now(),
                ]);
        }
    }
}
