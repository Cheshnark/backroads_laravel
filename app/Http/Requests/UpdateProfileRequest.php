<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
        $method = $this->method();
        if ($method  == 'PUT') {
            return [
                'profile_img' => ['required'],
                'description' => ['required'],
                'website' => ['required'],
                'facebook' => ['required'],
                'instagram' => ['required'],
                'twitter' => ['required'],
                'youtube' => ['required']
            ];
            // PATCH request
        } else {
            return [
                'profile_img' => ['sometimes'],
                'description' => ['sometimes'],
                'website' => ['sometimes'],
                'facebook' => ['sometimes'],
                'instagram' => ['sometimes'],
                'twitter' => ['sometimes'],
                'youtube' => ['sometimes']
            ];
        }
    }
}
