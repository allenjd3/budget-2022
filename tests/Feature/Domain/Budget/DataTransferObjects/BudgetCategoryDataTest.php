<?php

namespace Tests\Feature\Domain\Budget\DataTransferObjects;

use App\Admin\Requests\BudgetCategoryRequest;
use Budget\DataTransferObjects\BudgetCategoryData;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class BudgetCategoryDataTest extends TestCase
{
    use RefreshDatabase;

    protected $validated;

    protected function setUp(): void
    {
        parent::setUp();

        Route::post('/my-fake-route', function(BudgetCategoryRequest $request) {
            $this->validated = BudgetCategoryData::fromRequest($request);
        });
    }

    /** @test * */
    public function it_implements_arrayable()
    {
        $this->post('/my-fake-route', ['name' => 'My amazing name']);

        $this->assertEquals(['name' => 'My amazing name'], $this->validated->toArray());
    }
}
