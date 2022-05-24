<?php

namespace Budget\DataTransferObjects;

use App\Admin\Requests\BudgetMonthRequest;
use Authentication\Models\User;
use Budget\Actions\ConvertDollarsToIntegerAction;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Support\Arrayable;

class BudgetMonthData implements Arrayable
{
    public function __construct(
        public Carbon $month,
        public int $planned_income,
        public int $user_id,
    ) {
    }

    public static function fromRequest(
        BudgetMonthRequest $request,
        User|Authenticatable $user,
    ): BudgetMonthData {
        return new BudgetMonthData(
            month: Carbon::parse($request->get('month')),
            planned_income: (new ConvertDollarsToIntegerAction($request->get('planned_income')))->execute(),
            user_id: $user->id,
        );
    }

    public function toArray(): array
    {
        return [
            'month' => $this->month->format('Y-m-d'),
            'planned_income' => $this->planned_income,
            'user_id' => $this->user_id,
        ];
    }
}
