<?php

namespace Modules\SliderManagement\App\Http\Requests\Api\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ProgramRequestValidation extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $data = [
            /**validate order */
            'order' => ['sometimes', 'integer', 'min:0'],

            /**validate title in en & ar */
            'title' => ['required', 'array'],
            'title.en' => ['required', 'string', 'max:255'],
            'title.ar' => ['required', 'string', 'max:255'],

            /**validate text in en & ar */
            'text' => ['required', 'array'],
            'text.en' => ['required', 'string', 'max:1000'],
            'text.ar' => ['required', 'string', 'max:1000'],

            /**validate btn_title in en & ar */
            'btn_title' => ['required', 'array'],
            'btn_title.en' => ['required', 'string', 'max:100'],
            'btn_title.ar' => ['required', 'string', 'max:100'],

            /**validate btn_url */
            'btn_url' => ['required', 'string', 'max:500'],

            /**validate btn_active */
            'btn_active' => ['required', 'string', 'in:0,1']
        ];

        if (request()->isMethod('put')) {
            /**validate background in update method*/
            $data['background'] = ['nullable', 'image', 'mimes:png,jpg,jpeg,gif,svg', 'max:2048'];
        } elseif (request()->isMethod('post')) {
            /**validate background in post method*/
            $data['background'] = ['required', 'image', 'mimes:png,jpg,jpeg,gif,svg', 'max:2048'];
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

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'title.en.required' => 'Program slider title in English is required.',
            'title.ar.required' => 'Program slider title in Arabic is required.',
            'text.en.required' => 'Program slider text in English is required.',
            'text.ar.required' => 'Program slider text in Arabic is required.',
            'btn_title.en.required' => 'Program slider button title in English is required.',
            'btn_title.ar.required' => 'Program slider button title in Arabic is required.',
            'background.required' => 'Program slider background image is required.',
            'background.image' => 'Program slider background must be an image.',
            'background.mimes' => 'Program slider background must be a file of type: png, jpg, jpeg, gif, svg.',
            'background.max' => 'Program slider background may not be greater than 2MB.',
        ];
    }
}
