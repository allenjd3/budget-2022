<?php

namespace Authentication\Policies;

use Authentication\Models\User;
use Budget\Models\BudgetMonth;
use Illuminate\Auth\Access\HandlesAuthorization;

class BudgetMonthPolicy
{
    use HandlesAuthorization;

    public function view(User $user, BudgetMonth $budget): bool
    {
        return $budget->user->id === $user->id;
    }

    public function update(User $user, BudgetMonth $budget): bool
    {
        return $budget->user->id === $user->id;
    }
}
