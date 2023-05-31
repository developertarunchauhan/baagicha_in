<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubcategoryRequest extends FormRequest
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
                'title' => 'required|unique:subcategories|min:4|max:255',
                'cat' => 'required',
                'description' => 'required|min:5|max:500',
                'image' => 'required|image|mimes:png,jpeg,jpg|max:1024'
            ];
        } else {
            $rules = [
                'title' => 'required|min:4|max:255',
                //'cat' => 'required',
                'description' => 'required|min:5|max:500',
                'image' => 'image|mimes:png,jpeg,jpg|max:1024'
            ];
        }
        return $rules;
    }
}
