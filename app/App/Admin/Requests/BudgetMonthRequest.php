<?php

namespace App\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BudgetMonthRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'month' => [
                'required',
                'date',
                'after_or_equal:' . now()->format('Y-m-d'),
            ],
            'planned_income' => [
                'required',
                'numeric',
                'min:0',
            ],
        ];
    }
}
