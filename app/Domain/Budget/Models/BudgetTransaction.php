<?php

namespace Budget\Models;

use Database\Factories\BudgetTransactionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetTransaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function newFactory()
    {
        return new BudgetTransactionFactory();
    }
}
