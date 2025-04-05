<?php

namespace App\Models;

use Cknow\Money\Casts\MoneyIntegerCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionFactory> */
    use HasFactory;

    protected $fillable = ['transaction_id', 'date', 'amount', 'description'];

    public $casts = [
        'date' => 'datetime',
        'amount' => MoneyIntegerCast::class,
    ];
}
