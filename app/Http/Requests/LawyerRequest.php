<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LawyerRequest extends FormRequest
{
    public function authorize(): bool { return $this->user()?->can('update', \App\Models\Lawyer::class) ?? true; }
    public function rules(): array {
        return [
            'first_name' => ['required','string','max:255'],
            'last_name'  => ['required','string','max:255'],
            'title'      => ['nullable','string','max:255'],
            'bio'        => ['nullable','string'],
            'photo'      => ['nullable','image','mimes:jpg,jpeg,png,webp','max:2048'],
            'email'      => ['nullable','email','max:255'],
            'phone'      => ['nullable','string','max:50'],
            'education'  => ['nullable','array'],
            'experience' => ['nullable','array'],
            'languages'  => ['nullable','array'],
            'status'     => ['required','boolean'],
            'practices'  => ['nullable','array'],
            'practices.*'=> ['integer','exists:practices,id'],
        ];
    }
}