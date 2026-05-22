<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'name',
        'type',
        'icon',
        'color'
    ];

    public function transaction(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    // Accessor untuk warna badge di Filament
    public function getTypeLabelAttribute(): string
    {
        return match ($this->type) {
            'income'  => 'Pemasukan',
            'expense' => 'Pengeluaran',
            'saving'  => 'Tabungan',
        };
    }
}
