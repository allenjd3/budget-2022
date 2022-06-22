<?php

namespace Tests\Feature\App\Admin\ViewModels;

use App\Admin\ViewModels\BudgetCategoryFormViewModel;
use Budget\Models\BudgetCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BudgetCategoryFormViewModelTest extends TestCase
{
    use RefreshDatabase;

    /** @test * */
    public function it_returns_category_and_budget()
    {
        $category = BudgetCategory::factory()->create();

        $viewModel = (new BudgetCategoryFormViewModel($category->month, $category));

        $this->assertEquals(['category' => $category, 'budget' => $category->month], $viewModel->toArray());
    }
}
