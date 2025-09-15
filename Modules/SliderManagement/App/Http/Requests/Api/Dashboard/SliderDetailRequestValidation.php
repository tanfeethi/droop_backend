<?php

namespace Modules\SliderManagement\App\Http\Requests\Api\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class SliderDetailRequestValidation extends FormRequest
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
     */
    public function rules(): array
    {
        $data = [
            'slider_id' => ['required', 'integer', 'exists:sliders,id'],
            'title' => ['required', 'array'],
            'title.en' => ['required', 'string', 'max:255'],
            'title.ar' => ['required', 'string', 'max:255'],
            'description' => ['required', 'array'],
            'description.en' => ['required', 'string', 'max:1000'],
            'description.ar' => ['required', 'string', 'max:1000'],
            'order' => ['sometimes', 'integer', 'min:0']
        ];

        if ($this->isMethod('put')) {
            $data['image'] = ['nullable', 'image', 'mimes:png,jpg,jpeg,gif,svg', 'max:2048'];
        } elseif ($this->isMethod('post')) {
            $data['image'] = ['required', 'image', 'mimes:png,jpg,jpeg,gif,svg', 'max:2048'];
        }

        return $data;
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'slider_id.required' => 'Slider ID is required',
            'slider_id.exists' => 'Selected slider does not exist',
            'title.required' => 'Title is required',
            'title.en.required' => 'English title is required',
            'title.ar.required' => 'Arabic title is required',
            'description.required' => 'Description is required',
            'description.en.required' => 'English description is required',
            'description.ar.required' => 'Arabic description is required',
            'image.required' => 'Image is required',
            'image.image' => 'File must be an image',
            'image.mimes' => 'Image must be a file of type: png, jpg, jpeg, gif, svg',
            'image.max' => 'Image may not be greater than 2MB',
        ];
    }
}
