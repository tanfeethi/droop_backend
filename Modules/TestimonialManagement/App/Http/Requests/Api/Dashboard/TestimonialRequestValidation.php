<?php

namespace Modules\TestimonialManagement\App\Http\Requests\Api\Dashboard;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequestValidation extends FormRequest
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

            'text' => ['required', 'array'],
            'text.en' =>['required','string'],
            'text.ar' => ['required','string'],

            'position' => ['required', 'array'],
            'position.en' => ['required'],
            'position.ar' => ['required'],

            'social_type' => ['required', 'string',Rule::in([
                'facebook', 'instagram', 'twitter', 'linkedin', 'tiktok',
                'snapchat', 'youtube', 'pinterest', 'reddit', 'whatsapp',
                'telegram', 'discord', 'threads', 'wechat', 'tumblr', 'twitch',
                'vimeo', 'mastodon', 'clubhouse', 'flickr', 'medium', 'line', 'kakaotalk'
            ])],

            'social_url' => ['required','url'] ,




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
