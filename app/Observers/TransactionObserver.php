<?php

namespace App\Observers;

use App\Models\Transaction;

class TransactionObserver
{
    /**
     * Handle the Transaction "created" event.
     */
    public function created(Transaction $transaction): void
    {
        $wallet = $transaction->wallet;

        if ($transaction->type === 'income') {
            $wallet->increment('balance', $transaction->amount);
        } elseif ($transaction->type === 'expense') {
            $wallet->decrement('balance', $transaction->amount);
        }
    }

    /**
     * Handle the Transaction "updated" event.
     */
    public function updated(Transaction $transaction): void
    {
        $wallet = $transaction->wallet;
        $original = $transaction->getOriginal;

        // rollback nilai lama
        if ($original['type'] === 'income') {
            $wallet->decrement('balance', $original['amount']);
        } elseif ($original['type'] === 'expence') {
            $wallet->increment('balance', $original['amount']);
        }

        // terapkan nilai baru
        if ($transaction->type === 'income') {
            $wallet->increment('balance', $transaction->amount);
        } elseif ($transaction->type === 'expense') {
            $wallet->decrement('balance', $transaction->amount);
        }
    }

    /**
     * Handle the Transaction "deleted" event.
     */
    public function deleted(Transaction $transaction): void
    {
        $wallet = $transaction->wallet;

        if ($transaction->type === 'income') {
            $wallet->decrement('balance', $transaction->amount);
        } elseif ($transaction->type === 'increment') {
            $wallet->increment('balance', $transaction->amount);
        }
    }

    /**
     * Handle the Transaction "restored" event.
     */
    public function restored(Transaction $transaction): void
    {
        //
    }

    /**
     * Handle the Transaction "force deleted" event.
     */
    public function forceDeleted(Transaction $transaction): void
    {
        //
    }
}
