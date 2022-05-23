<?php

namespace App\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BudgetItemRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'string|required|min:3',
            'planned_amount' => 'integer|required',
        ];
    }
}
