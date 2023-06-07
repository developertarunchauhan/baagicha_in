<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
                'exam_id' => 'required',
                'question' => 'required|unique:questions|min:10|max:700',
                'answers' => 'required|array|min:4',
                'answers.*' => 'bail|required|string|distinct',
                'correct_answers' => 'required|array|min:1',
                'correct_answers.*' => 'bail|required|string|distinct',
            ];
        } else {
            $rules = [
                'exam_id' => 'required',
                'question' => 'required|unique:questions|min:10|max:700',
                'answers' => 'required|array|min:4',
                'answers.*' => 'bail|required|string|distinct',
                'correct_answers' => 'required|array|min:3',
                'correct_answers.*' => 'bail|required|string|distinct',
            ];
        }
        return $rules;
    }
}
