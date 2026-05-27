<?php

namespace App\Http\Requests;

use App\Models\Nota;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateNotaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'titulo' => ['required', 'string', 'max:120'],
            'contenido' => ['required', 'string'],
            'categoria' => [
                'required',
                'string',
                'max:40',
                Rule::in(Nota::CATEGORIAS),
            ],
            'fijada' => ['nullable', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required' => 'El título es obligatorio.',
            'titulo.max' => 'El título no debe superar los 120 caracteres.',
            'contenido.required' => 'El contenido es obligatorio.',
            'categoria.required' => 'La categoría es obligatoria.',
            'categoria.in' => 'La categoría seleccionada no es válida.',
            'fijada.boolean' => 'El campo fijada debe ser verdadero o falso.',
        ];
    }
}
