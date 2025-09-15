<?php

namespace Modules\ProjectManagement\App\Http\Requests\Api\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AttachManagersToProjectRequestValidation extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'project_id' => ['required', 'numeric', 'exists:projects,id'],
            'managers' => ['nullable', 'array'],
            'managers.*.position.en' => ['required_with:managers', 'string'],
            'managers.*.position.ar' => ['required_with:managers', 'string'],
            'managers.*.name.en' => ['required_with:managers', 'string'],
            'managers.*.name.ar' => ['required_with:managers', 'string'],
            'managers.*.arrange' => ['required','numeric','min:1']
        ];
        
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
