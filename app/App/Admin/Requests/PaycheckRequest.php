<?php

namespace App\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaycheckRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'amount' => [
                'required',
                'numeric',
            ],
            'payday' => [
                'required',
                'date',
            ],
        ];
    }
}
