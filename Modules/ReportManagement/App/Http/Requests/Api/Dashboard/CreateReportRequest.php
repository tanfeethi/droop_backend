<?php

namespace Modules\ReportManagement\App\Http\Requests\Api\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class CreateReportRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $data =  [
            'name' =>['required','string'],

            'type' => ['required','in:report,visual']
        ];

        if(request()->isMethod('post')){
            $data['report'] = ['required', 'file', 'mimes:pdf,doc,docx,csv,xlsx,png,jpg,jpeg,giv,svg', 'max:30720']; // report بحد أقصى 5MB,
        }elseif(request()->isMethod('put')){
            $data['report'] = ['nullable', 'file', 'mimes:pdf,doc,docx,csv,xlsx,png,jpg,jpeg,giv,svg', 'max:30720']; // report بحد أقصى 5MB,
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
