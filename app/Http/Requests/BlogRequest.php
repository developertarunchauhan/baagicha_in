<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title' => 'required|unique:blogs|min:3|max:255',
            'excrept' => 'required|max:255',
            'body' => 'required',
            'image' => 'required|image|mimes:png,jpeg,jpg|max:1024',
            'tags' => 'required',
            'meta_description' => 'required|max:255',
            'seo_title' => 'required|max:255',
            'status' => 'required',
        ];
    }
}
