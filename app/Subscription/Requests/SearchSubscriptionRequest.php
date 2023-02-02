<?php

namespace App\Subscription\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchSubscriptionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'text' => ['sometimes', 'string', 'nullable'],
            'user_id' => ['required', 'integer']
        ];
    }
}
