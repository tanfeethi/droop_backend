<?php

namespace Modules\BlogManagement\App\Http\Requests\Api\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequestValidation extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $data = [
            /**validate title in en & ar */
            'title' => ['required', 'array'],
            'title.en' => ['required', 'string'],
            'title.ar' => ['required', 'string'],

            /**validate text in en & ar */
            'text' => ['required', 'array'],
            'text.en' =>['required','string'],
            'text.ar' => ['required','string'],
            'status' =>  ['required','boolean'],


            'tags' => ['nullable', 'array'],
            'tags.*' =>['nullable','string'],

            'cv' => ['nullable', 'file', 'mimes:pdf','max:21200'],
            'details' => ['nullable', 'array'],
            'details.en' =>['nullable','string'],
            'details.ar' => ['nullable','string'],
        ];

        if (request()->isMethod('put')) {

            /**validate icon in update method*/
            $data['background'] = ['nullable', 'image', 'mimes:png,jpg,jpeg,giv,svg'];
        } elseif (request()->isMethod('post')) {

            /**validate icon in post method*/
            $data['background'] = ['required', 'image', 'mimes:png,jpg,jpeg,giv,svg'];
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
