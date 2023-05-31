<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;


class UserRequest extends FormRequest
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
        if (request()->isMethod('POST')) {
            $rules = [
                'name' => 'required|string|max:255|min:2|unique:users',
                'email' => 'required|string|email|max:255|unique:users',
                'role_id' => 'required',
                'password' => 'required|string|min:8|confirmed',
            ];
        } elseif (request()->isMethod('PUT')) {
            $rules = [
                'name' => 'required|string|max:255|min:2',
                'role_id' => 'required',
            ];
        } else {
        }
        return $rules;
    }
}
