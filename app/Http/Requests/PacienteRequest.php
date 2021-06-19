<?php

namespace App\Http\Requests;

use App\Rules\NumberPhone;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class PacienteRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'foto'             => ['nullable', 'image', 'max:4096'],
            'nombres'          => ['required', 'string', 'min:2', 'max:120'],
            'apellido_paterno' => ['required', 'string', 'min:2', 'max:120'],
            'apellido_materno' => ['nullable', 'string', 'min:2', 'max:120'],
            'fecha_nacimiento' => ['required', 'date_format:Y-m-d'],
            'sexo'             => ['required', 'string', 'max:1'],
            'peso'             => ['required', 'numeric'],
            'altura'           => ['required', 'numeric'],
            'estado'           => ['required', 'string', 'min:4', 'max:120'],
            'municipio'        => ['required', 'string', 'min:4', 'max:120'],
            'colonia'          => ['required', 'string', 'min:4', 'max:255'],
            'domicilio'        => ['required', 'string', 'min:4', 'max:255'],
            'codigo_postal'    => ['required', 'numeric'],
            'email'            => ['nullable', 'email', 'max:120'],
            'telefono_fijo'    => ['nullable', new NumberPhone(), 'max:18'],
            'telefono_movil'   => ['nullable', new NumberPhone(), 'max:18']
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
