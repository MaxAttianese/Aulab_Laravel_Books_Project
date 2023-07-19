<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class bookRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "title" => "required|max:150",

            "author" => "required|max:100",

            "publicated" => "required|max:4",
            
            "gender" => "required|max:50",
            
            "theme" => "required",
        ];
    }

    public function messages(): array
    {
        return [
            "title.required" => "Il campo è obbligatorio",
            
            "title.max" => "Massimo 150 caratteri",

            "publicated.required" => "Il campo è obbligatorio",
            
            "publicated.max" => "Massimo 4 caratteri",
            
            "gender.required" => "Il campo è obbligatorio",
            
            "gender.max" => "Massimo 50 caratteri",

            "theme.required" => "Il campo è obbligatorio",
            
        ];
    }
};