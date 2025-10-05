<?php

namespace Modules\CoachManagment\App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class CoachJoinRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => ['required','string'],
            'phone' => ['required','string'],
            'linkedin' => ['required','string'],
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
