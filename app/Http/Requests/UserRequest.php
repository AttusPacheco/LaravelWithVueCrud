<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
        ];

        if (!$this->route('id')) {
            $rules['password'] = 'required';
        } else {
            $rules['email'] .= "|unique:users,email,{$this->route('id')}";
        }

        return $rules;
    }
}
