<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;

class FilmRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'publication_status' => 'boolean',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'genres' => 'nullable|array',
            'genres.*' => 'exists:genres,id',
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