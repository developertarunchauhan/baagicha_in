<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|unique:roles|min:4|max:255',
            'description' => 'required|min:5|max:500'
        ];
    }
    public function message()
    {
        return [
            'title.required' => 'Oh Snap !! yo forgot to enter your title for your role',
        ];
    }
}
