<?php

namespace Modules\ProjectManagement\App\Http\Requests\Api\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AttachTrainersToProjectRequestValidation extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'project_id' => ['required', 'numeric','exists:projects,id'],
            'trainersIds' => ['required','array'],
            'trainersIds.*' => ['required','numeric','exists:trainers,id'],
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
