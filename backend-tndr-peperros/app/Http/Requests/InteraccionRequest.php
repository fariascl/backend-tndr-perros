<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class InteraccionRequest extends FormRequest
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
            "perro_candidato_id" => "required|integer|different:perro_interesado_id|exists:perros,id",
            "perro_interesado_id" => "required|integer|different:perro_candidato_id|exists:perros,id",
            "preferencia" => "in:A,R"
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es requerido',
            'in' => 'Preferencia no válida, solo A (aceptar) o R (rechazar)',
            'different' => 'Los campos deben ser diferentes',
            'exists' => 'El id del perro \':attribute\' debe existir',
            'integer' => 'El campo debe \':attribute\' debe ser entero'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json($validator->errors()->all(), Response::HTTP_BAD_REQUEST)
        );
    }
}
