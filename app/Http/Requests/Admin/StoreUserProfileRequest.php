<?php

namespace App\Http\Requests\UserProfile;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserProfileRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' =>['required','string'],
            'email' =>['required','string'],
            'phone' =>['required','integer'],
            'photo' =>['required','mimes:png,jpg,jpeg'],
            'date_of_birth' =>['required','string'],
            'address' =>['required','string'],
            'facebook_url' => ['nullable', 'url'],
            'instagram_url' => ['nullable', 'url'],
            'linkedin_url' => ['nullable', 'url'],
            'twitter_url' => ['nullable', 'url']
        ];
    }

}
