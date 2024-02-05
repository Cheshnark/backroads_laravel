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
                'coordinates' => ['required'],
                'title' => ['required'],
                'body' => ['required'],
                'location_type' => ['required'],
                'address' => ['required'],
                'services' => ['required'],
                'price' => ['required'],
                'opening_hours' => ['required'],
                'score' => ['required'],
                'comments' => ['required'],
                'images' => ['required'],
            ];
        // PATCH request
        } else {
            return [
                'coordinates' => ['sometimes'],
                'title' => ['sometimes'],
                'body' => ['sometimes'],
                'location_type' => ['sometimes'],
                'address' => ['sometimes'],
                'services' => ['sometimes'],
                'price' => ['sometimes'],
                'opening_hours' => ['sometimes'],
                'score' => ['sometimes'],
                'comments' => ['sometimes'],
                'images' => ['sometimes'],
            ];
        }
    }
}
