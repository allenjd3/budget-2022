<?php

namespace Tests\Feature\App\Admin\Controllers;

use Authentication\Models\User;
use Budget\Models\BudgetMonth;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BudgetControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test * */
    public function unauthenticated_users_are_redirected_to_login()
    {
        $this->get(route('budget.index'))
            ->assertRedirect(route('login'));
    }

    /** @test * */
    public function a_user_can_view_their_own_budgets()
    {
        $budget = BudgetMonth::factory()->create();
        $this->actingAs($budget->user)->get(route('budget.show', $budget))->assertOk();
    }

    /** @test * */
    public function a_user_cannot_view_another_users_budgets()
    {
        $budget = BudgetMonth::factory()->create();
        $user = User::factory()->create();

        $this->actingAs($user)->get(route('budget.show', $budget))->assertForbidden();
    }

    /** @test * */
    public function a_user_only_has_their_budgets_showing_in_index()
    {
        $budgets = BudgetMonth::factory()->state(['user_id' => User::factory()->create()->id])->count(3)->create();
        BudgetMonth::factory()->create();

        $responseContent = $this->actingAs($budgets->first()->user)->get(route('budget.index'));
        $this->assertCount(3, $responseContent->getOriginalContent()['budgets']);
    }

    /** @test * */
    public function a_user_can_create_a_budget()
    {
        $date = Carbon::parse('+4 weeks');
        $this->actingAs(User::factory()->create())->post(route('budget.store'), ['month' => $date])->assertRedirect();

        $this->assertDatabaseHas('budget_months', [
            'month' => $date->format('Y-m-d'),
        ]);
    }

    /** @test * */
    public function a_user_can_update_their_budget_month()
    {
        $newDate = Carbon::parse('+4 weeks');
        $budget = BudgetMonth::factory()->create();
        $this->actingAs($budget->user)->patch(route('budget.update', $budget), ['month' => $newDate])->assertRedirect();

        $this->assertDatabaseHas('budget_months', [
            'month' => $newDate->format('Y-m-d'),
        ]);
    }

    /** @test * */
    public function a_user_cannot_update_another_users_month()
    {
        $newDate = Carbon::parse('+4 weeks');
        $budget = BudgetMonth::factory()->create();
        $this->actingAs(User::factory()->create())->patch(route('budget.update', $budget), ['month' => $newDate])
            ->assertForbidden();
    }

    /** @test * */
    public function a_user_can_delete_their_month()
    {
        $budget = BudgetMonth::factory()->create();
        $this->actingAs($budget->user)->delete(route('budget.destroy', $budget))->assertRedirect();

        $this->assertDatabaseMissing('budget_months', [
            'month' => $budget->month,
        ]);
    }

    /** @test * */
    public function a_user_cannot_delete_another_users_month()
    {
        $budget = BudgetMonth::factory()->create();
        $this->actingAs(User::factory()->create())->delete(route('budget.destroy', $budget))->assertForbidden();

        $this->assertDatabaseHas('budget_months', [
            'month' => $budget->month,
        ]);
    }
}
