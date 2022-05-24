<?php

namespace Budget\Models;

use Authentication\Models\User;
use Budget\Actions\ConvertIntegerToDollarsAction;
use Database\Factories\BudgetMonthFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetMonth extends Model
{
    use HasFactory;

    protected $casts = [
        'month' => 'date',
    ];

    protected $guarded = [];

    public static function newFactory()
    {
        return new BudgetMonthFactory();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->hasMany(BudgetCategory::class);
    }

    public function getTotalPlannedAttribute()
    {
        return (new ConvertIntegerToDollarsAction(
            $this->join('budget_categories', 'budget_months.id', '=', 'budget_categories.budget_month_id')
            ->join('budget_items', 'budget_categories.id', '=', 'budget_items.budget_category_id')
            ->sum('planned_amount')
        ))->execute();
    }

    public function getTotalPlannedIncomeAttribute()
    {
        return (new ConvertIntegerToDollarsAction($this->planned_income))->execute();
    }
}
