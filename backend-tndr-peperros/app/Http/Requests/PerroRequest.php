<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class PerroRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "nombre" => "required|string",
            "imagen" => "required|string",
            "descripcion" => "required|string",
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es requerido',
            'string' => 'El campo :attribute debe ser de tipo string'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json($validator->errors()->all(), Response::HTTP_BAD_REQUEST)
        );
    }
}
