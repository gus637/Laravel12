<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskStoreRequest extends FormRequest
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
            'task' => 'required|string|min:10|max:200',
            'begindate' => 'required|date',
            'enddate' => 'date|after_or_equal:begindate|nullable',
            'user_id' => 'int|exists:users,id|nullable',
            'project_id' => 'required|int|exists:projects,id',
            'activity_id' => 'required|int|exists:activities,id',
        ];
    }
}
