<?php

namespace Tests\Feature\App\Admin\ViewModels;

use App\Admin\ViewModels\BudgetItemFormViewModel;
use Budget\Models\BudgetItem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BudgetItemFormViewModelTest extends TestCase
{
    use RefreshDatabase;

    /** @test * */
    public function it_returns_category_and_item()
    {
        $item = BudgetItem::factory()->create();

        $viewModel = (new BudgetItemFormViewModel($item->category, $item));

        $this->assertEquals(['item' => $item, 'category' => $item->category], $viewModel->toArray());
    }
}
