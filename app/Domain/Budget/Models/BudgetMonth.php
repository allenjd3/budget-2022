<?php

namespace Budget\Models;

use App\Exceptions\TransactionSumNotEagerLoadedException;
use Attribute;
use Authentication\Models\User;
use Budget\Actions\ConvertIntegerToDollarsAction;
use Database\Factories\BudgetMonthFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Log;

class BudgetMonth extends Model
{
    use HasFactory;

    protected $casts = [
        'month' => 'date',
    ];

    protected $guarded = [];

    public static function newFactory(): BudgetMonthFactory
    {
        return new BudgetMonthFactory();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function categories(): HasMany
    {
        return $this->hasMany(BudgetCategory::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(BudgetTransaction::class);
    }

    public function paychecks(): HasMany
    {
        return $this->hasMany(Paycheck::class);
    }

    public function getTotalPlannedAttribute(): ConvertIntegerToDollarsAction|string
    {
        return (new ConvertIntegerToDollarsAction(
            $this->join('budget_categories', 'budget_months.id', '=', 'budget_categories.budget_month_id')
            ->join('budget_items', 'budget_categories.id', '=', 'budget_items.budget_category_id')
            ->sum('planned_amount')
        ));
    }

    public function getPlannedIncome(): string
    {
        return (new ConvertIntegerToDollarsAction($this->planned_income))->execute();
    }

    public function getFormattedPlannedIncome(): ConvertIntegerToDollarsAction|string
    {
        return (new ConvertIntegerToDollarsAction($this->planned_income));
    }

    public function getFormattedActualIncome(): ConvertIntegerToDollarsAction|string
    {
        return (new ConvertIntegerToDollarsAction($this->paychecks()->sum('amount')));
    }

    public function getFormattedTransactionSumAmount(): ConvertIntegerToDollarsAction|string
    {
        if (! $this->transactions_sum_amount) {
            Log::warning('You are not eager loading the transaction sum amount on BudgetMonth');
            return (new ConvertIntegerToDollarsAction($this->transactions()->sum('amount')));
        }
        return (new ConvertIntegerToDollarsAction($this->transactions_sum_amount));
    }
}
