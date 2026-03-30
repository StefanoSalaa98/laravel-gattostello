<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCatRequest extends FormRequest
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
        $catId = $this->route('cat')->id; // recupera l'ID dal modello passato alla route

        return [
            'name' => 'required|string|max:255',
            'slug' => "required|string|max:255|unique:cats,slug,{$catId}",
            'sex' => 'required|in:M,F',
            'date_of_birth' => 'nullable|date_format:Y-m',
            'coat' => 'nullable|string|max:100',
            'info' => 'nullable|string',
            'image' => 'nullable|image|max:2048', // l'immagine non è obbligatoria nella update 
            'adottato' => 'nullable|boolean',
            'prenotato' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Il nome è obbligatorio',
            'slug.required' => 'Lo slug è obbligatorio',
            'slug.unique' => 'Questo slug esiste già',
            'sex.in' => 'Il sesso deve essere M o F',
            'date_of_birth.date_format' => 'La data di nascita deve essere nel formato YYYY-MM',
            'image.image' => 'Il file deve essere una immagine',
        ];
    }
}
