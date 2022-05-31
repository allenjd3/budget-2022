<?php

namespace Budget\Models;

use Budget\Collections\BudgetTransactionCollection;
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

    public function newCollection(array $models = []): BudgetTransactionCollection
    {
        return new BudgetTransactionCollection($models);
    }
}
