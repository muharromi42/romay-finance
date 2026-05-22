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
        $type   = $transaction->category->type; // ambil dari category
        $wallet = $transaction->wallet;

        if ($type === 'income') {
            $wallet->increment('balance', $transaction->amount);
        } elseif ($type === 'expense') {
            $wallet->decrement('balance', $transaction->amount);
        }
    }

    /**
     * Handle the Transaction "updated" event.
     */
    public function updated(Transaction $transaction): void
    {
        // Ambil nilai lama
        $originalCategoryId = $transaction->getOriginal('category_id');
        $originalWalletId   = $transaction->getOriginal('wallet_id');
        $originalAmount     = $transaction->getOriginal('amount');

        $originalCategory = \App\Models\Category::find($originalCategoryId);
        $originalWallet   = \App\Models\Wallet::find($originalWalletId);
        $originalType     = $originalCategory->type;

        // Rollback nilai lama ke wallet lama
        if ($originalType === 'income') {
            $originalWallet->decrement('balance', $originalAmount);
        } elseif ($originalType === 'expense') {
            $originalWallet->increment('balance', $originalAmount);
        }

        // Terapkan nilai baru ke wallet baru
        $newType = $transaction->category->type;

        if ($newType === 'income') {
            $transaction->wallet->increment('balance', $transaction->amount);
        } elseif ($newType === 'expense') {
            $transaction->wallet->decrement('balance', $transaction->amount);
        }
    }

    /**
     * Handle the Transaction "deleted" event.
     */
    public function deleted(Transaction $transaction): void
    {
        $type   = $transaction->category->type;
        $wallet = $transaction->wallet;

        // Balik efek transaksi yang dihapus
        if ($type === 'income') {
            $wallet->decrement('balance', $transaction->amount);
        } elseif ($type === 'expense') {
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
