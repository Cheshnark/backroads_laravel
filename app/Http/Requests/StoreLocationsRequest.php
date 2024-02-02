<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLocationsRequest extends FormRequest
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
            'userId' => ['required'],
            'coordinates' => ['required'],
            'title' => ['required'],
            'body',
            'locationType' => ['required'],
            'address' => ['required'],
            'services',
            'price',
            'openingHours',
            'images'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => $this->userId,
            'location_type' => $this-> locationType,
            'opening_hours' => $this-> openingHours
        ]);
    }
}
