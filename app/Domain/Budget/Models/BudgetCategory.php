<?php

namespace Budget\Models;

use Database\Factories\BudgetCategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Support\Models\BudgetMonth;

class BudgetCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function newFactory()
    {
        return new BudgetCategoryFactory();
    }

    public function month()
    {
        $this->belongsTo(BudgetMonth::class, 'budget_month_id');
    }
}
