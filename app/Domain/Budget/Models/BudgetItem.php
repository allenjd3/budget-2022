<?php

namespace Budget\Models;

use Budget\Collections\BudgetItemCollection;
use Database\Factories\BudgetItemFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function newFactory()
    {
        return new BudgetItemFactory();
    }

    public function newCollection(array $models = []): BudgetItemCollection
    {
        return new BudgetItemCollection($models);
    }

    public function category()
    {
        return $this->belongsTo(BudgetCategory::class, 'budget_category_id');
    }
}
