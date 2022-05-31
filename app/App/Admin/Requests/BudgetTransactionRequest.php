<?php

namespace App\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BudgetTransactionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'amount' => [
                'numeric',
                'required',
            ],
            'budget_item_id' => [
                'nullable',
                'integer',
            ],
        ];
    }
}
