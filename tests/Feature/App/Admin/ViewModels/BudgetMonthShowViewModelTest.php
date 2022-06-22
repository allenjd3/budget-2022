<?php

namespace Tests\Feature\App\Admin\ViewModels;

use App\Admin\ViewModels\BudgetMonthShowViewModel;
use Budget\Actions\CalculateRemainingAction;
use Budget\Models\BudgetCategory;
use Budget\Models\BudgetItem;
use Budget\Models\BudgetMonth;
use Budget\Models\BudgetTransaction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BudgetMonthShowViewModelTest extends TestCase
{
    use RefreshDatabase;

    /** @test * */
    public function it_returns_budget_transactions_and_calculated_remainders()
    {
        $transactions = BudgetTransaction::factory()->for(BudgetMonth::factory()->has((BudgetCategory::factory()->has(BudgetItem::factory(), 'items')), 'categories'), 'month')->count(5)->create();
        $month = BudgetMonth::where('id', $transactions->first()->budget_month_id)->withSum('transactions', 'amount')->first();

        $viewModel = (new BudgetMonthShowViewModel($month, $transactions));

        $this->assertEquals([
            'budget' => $month,
            'transactions' => $transactions,
            'plannedAmountRemainder' => (new CalculateRemainingAction($month->planned_income, $month->categories()->withSum('items', 'planned_amount')->get()->sum('items_sum_planned_amount'))),
            'actualAmountRemainder' => (new CalculateRemainingAction($month->paychecks()->sum('amount'), $month->transactions_sum_amount)),
        ], $viewModel->toArray());
    }
}
