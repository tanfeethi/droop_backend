<?php

namespace Modules\ProjectManagement\App\Http\Requests\Api\Dashboard;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Modules\ProjectManagement\App\Models\Project;

class ProjectRequestValidation extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $data = [
            'title' => ['required', 'array'],
            'title.en' => ['required', 'string'],
            'title.ar' => ['required', 'string'],

            'text' => ['required', 'array'],
            'text.en' =>['required','string'],
            'text.ar' => ['required','string'],

            'tags' => ['nullable', 'array'],
            'tags.*' =>['nullable','string'],

            'parent_id' => ['nullable','numeric','exists:projects,id',function($attribute,$value,$fail){
                $project = Project::where('parent_id',null)->find($value);
                if(!$project){
                    $fail('parent_id belongs to child');
                }
            }],

            'version' => ['nullable','array'],
            'version.en' =>['string'],
            'version.ar' => ['string'],

            'type' => ['required','string','in:main,other'],
            'number_of_beneficiaries' => ['nullable','numeric'],

            'report' => ['nullable','file','mimes:pdf'],

        ];

        if(request()->isMethod('post')){
            $data['thumbnail'] =  ['required','image','mimes:png,jpg,jpeg,gif,svg'];
        }elseif(request()->isMethod('put')){
            $data['thumbnail'] =  ['nullable','image','mimes:png,jpg,jpeg,gif,svg'];
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
