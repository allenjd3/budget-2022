<?php

namespace Tests\Feature\App\Admin\ViewModels;

use App\Admin\ViewModels\BudgetFormViewModel;
use Budget\Models\BudgetMonth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BudgetFormViewModelTest extends TestCase
{
    use RefreshDatabase;

    /** @test * */
    public function it_returns_a_budget()
    {
        $budget = BudgetMonth::factory()->create();
        $viewModel = (new BudgetFormViewModel($budget));

        $this->assertEquals(['budget' => $budget], $viewModel->toArray());
    }
}
