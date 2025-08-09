<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PracticeRequest extends FormRequest
{
    public function authorize(): bool { return true; }
    public function rules(): array {
        return [
            'name' => ['required','string','max:255'],
            'short_description' => ['nullable','string','max:1000'],
            'full_description' => ['nullable','string'],
            'icon' => ['nullable','string','max:255'],
            'order' => ['nullable','integer','min:0'],
            'meta_title' => ['nullable','string','max:255'],
            'meta_description' => ['nullable','string','max:500'],
            'lawyers' => ['nullable','array'],
            'lawyers.*' => ['integer','exists:lawyers,id'],
        ];
    }
}