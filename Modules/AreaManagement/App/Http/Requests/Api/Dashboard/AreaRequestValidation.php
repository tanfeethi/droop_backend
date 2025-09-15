<?php

namespace Modules\AreaManagement\App\Http\Requests\Api\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class AreaRequestValidation extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'location' => ['required','array'],
            'location.en' => ['required','string'],
            'location.ar' => ['required','string'],

            'number_of_projects' => ['required','numeric','min:0'],
            'number_of_beneficiaries' => ['required','numeric','min:0'],
            'number_of_programs' => ['required','numeric','min:0'],
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
