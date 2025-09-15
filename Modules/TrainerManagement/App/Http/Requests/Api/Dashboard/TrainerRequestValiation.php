<?php

namespace Modules\TrainerManagement\App\Http\Requests\Api\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class TrainerRequestValiation extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $data =  [
            'name' =>['required','string'],
          
            'address' =>['required','string'],
            'filed' =>['required','string'],
            'trainee_count' =>['required','integer'],
            'program_count' =>['required','integer'],
            'hours_count' =>['required','integer'],
            'hours_yafee_count' =>['required','integer'],
            'cv' => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:5120'], // CV بحد أقصى 5MB
            'linkedin' =>['nullable','string'],
            'facebook' =>['nullable','string'],
            'x' =>['nullable','string'],
        ];
        if(request()->isMethod('post')){
            $data['image'] = ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048']; // صورة بحد أقصى 2MB
        }else{
            $data['image'] = ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048']; // صورة بحد أقصى 2MB
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
