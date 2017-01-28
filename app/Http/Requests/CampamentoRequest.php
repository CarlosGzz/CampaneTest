<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampamentoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|string|unique:campamentos|max:45',
            'fechaInicio' => 'required|date',
            'fechaFinal' => 'required|date|after:fechaInicio',
            'actual' => 'nullable|boolean',
        ];

    }
}
