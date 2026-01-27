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
//            'task' => 'required|string|max:40',
//            'begindate' => 'required|date',
//            'enddate' => 'required|date|after_or_equal:begindate',
//            'user_id' => 'required|exists:users,id',
//            'project_id' => 'required|exists:projects,id',
//            'activity_id' => 'required|exists:activities,id',
        ];
    }
}
