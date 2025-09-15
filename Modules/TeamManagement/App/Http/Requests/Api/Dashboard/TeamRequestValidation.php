<?php

namespace Modules\TeamManagement\App\Http\Requests\Api\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequestValidation extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $data = [
            'name' => ['required', 'array'],
            'name.en' => ['required', 'string'],
            'name.ar' => ['required', 'string'],

            'position' => ['required', 'array'],
            'position.en' => ['required'],
            'position.ar' => ['required'],

            'text' => ['required', 'array'],
            'text.en' => ['required'],
            'text.ar' => ['required'],

            'cv' => ['nullable', 'file', 'mimes:pdf','max:21200'],
            'details' => ['nullable', 'array'],
            'details.en' =>['nullable','string'],
            'details.ar' => ['nullable','string'],
        ];

        if (request()->isMethod('put')) {

            /**validate icon in update method*/
            $data['image'] = ['nullable', 'image', 'mimes:png,jpg,jpeg,giv,svg'];
        } elseif (request()->isMethod('post')) {

            /**validate icon in post method*/
            $data['image'] = ['required', 'image', 'mimes:png,jpg,jpeg,giv,svg'];
        }

        return $data;
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
