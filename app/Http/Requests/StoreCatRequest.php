<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCatRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'sex' => 'required|in:M,F',
            'date_of_birth' => 'nullable|date_format:Y-m',
            'coat' => 'nullable|string|max:100',
            'info' => 'nullable|string',
            'image' => 'required|image|max:2048',
            // 'image' => 'nullable|image|max:2048',
            'adottato' => 'nullable|boolean',
            'prenotato' => 'nullable|boolean',
        ];
    }

    /* Messaggi personalizzati per il tipo di errore */
    public function messages(): array
    {
        return [
            'name.required' => 'Il nome è obbligatorio',
            'sex.in' => 'Il sesso deve essere M o F',
            'image.image' => 'Il file deve essere una immagine',
            'date_of_birth.date_format' => 'La data di nascita deve essere nel formato YYYY-MM',
            'image.required' => 'Devi selezionare una immagine del gatto',
        ];
    }
}
