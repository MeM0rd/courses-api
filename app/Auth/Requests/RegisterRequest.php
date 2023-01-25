<?php

namespace App\Auth\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email'     => ['required','email'],
            'password'  => ['required','string'],
            'name'      => ['sometimes','string'],
            'phone'     => ['sometimes','integer'],
        ];
    }
}
