<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
                'title' => 'required|unique:categories|min:4|max:255',
                'description' => 'required|min:5|max:500',
                'image' => 'required|image|mimes:png,jpeg,jpg|max:2048'
            ];
        } elseif (request()->isMethod('PUT')) {
            $rules = [
                'title' => 'required|min:4|max:255',
                'description' => 'required|min:5|max:500',
                'image' => 'image|mimes:png,jpeg,jpg|max:2048'
            ];
        } else {
        }
        return $rules;
    }
}
