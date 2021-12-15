<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class QuickLoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email'
        ];
    }
}
