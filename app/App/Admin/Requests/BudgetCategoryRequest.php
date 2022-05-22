<?php

namespace App\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BudgetCategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:2',
        ];
    }
}
