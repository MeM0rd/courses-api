<?php

namespace App\Subscription\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'id' => ['sometimes', 'integer'],
            'user_id' => ['required','integer'],
            'name' => ['sometimes', 'string'],
            'cost' => ['sometimes', 'numeric'],
            'currency' => ['sometimes', 'string'],
            'note' => ['sometimes', 'string']
        ];
    }
}
