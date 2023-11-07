<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:4|max:100',
            'due_date' => 'required|date|after_or_equal:today',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Task is required',
            'name.min' => 'Task  must be at least 4 characters',
            'name.max' => 'Task  must be at most 100 characters',
            'due_date.required' => 'Due date is required',
            'due_date.after_or_equal' => 'Due date must be after or equal to today',
        ];
    }
}
