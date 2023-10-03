<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;

class GenreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = new JsonResponse([  
            'errors' => $validator->errors(),
        ], 400);

        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
}