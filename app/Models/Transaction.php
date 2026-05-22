<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $fillable = [
        'category_id',
        'wallet_id',
        'amount',
        'note',
        'date'
    ];

    // Ambil type dari category
    public function getTypeAttribute(): string
    {
        return $this->category->type;
    }


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function wallet(): BelongsTo
    {
        return $this->belongsTo(Wallet::class);
    }
}
