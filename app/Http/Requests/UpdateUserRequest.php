<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLocationsRequest extends FormRequest
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
          'name' => ['required'],
          'email' => ['required', 'email'],
          'profile_img' => ['required'],
          'description' => ['required']
        ];
      // PATCH request
      } else {
        return [
          'name' => ['sometimes'],
          'email' => ['sometimes', 'email'],
          'profile_img' => ['sometimes'],
          'description' => ['sometimes']
        ];
      }
    }
}