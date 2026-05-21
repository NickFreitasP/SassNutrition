<?php

namespace App\Interfaces\Web\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email'],
            'birth_date' => ['nullable', 'date'],
            'height' => ['nullable', 'numeric'],
            'notes' => ['nullable', 'string'],
            'phone' => ['nullable', 'string'],
            'weight' => ['nullable', 'numeric'],
        ];
    }
}
