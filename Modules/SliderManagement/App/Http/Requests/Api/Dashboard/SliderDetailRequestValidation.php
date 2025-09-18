<?php

namespace Modules\SliderManagement\App\Http\Requests\Api\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class SliderDetailRequestValidation extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('put') || $this->isMethod('patch');
        $required = $isUpdate ? 'sometimes' : 'required';
        $imageRule = $isUpdate ? 'nullable' : 'required';

        return [
            'slider_id' => [$required, 'integer', 'exists:sliders,id'],
            'title' => [$required, 'array'],
            'title.en' => [$required, 'string', 'max:255'],
            'title.ar' => [$required, 'string', 'max:255'],
            'description' => [$required, 'array'],
            'description.en' => [$required, 'string', 'max:1000'],
            'description.ar' => [$required, 'string', 'max:1000'],
            'image' => [$imageRule, 'image', 'mimes:png,jpg,jpeg,gif,svg', 'max:2048'],
            'order' => ['sometimes', 'integer', 'min:0']
        ];
    }
}
