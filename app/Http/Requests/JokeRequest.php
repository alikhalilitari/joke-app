<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class JokeRequest extends FormRequest
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
            'limit' => ['sometimes', 'required', 'integer','min:2', 'max:10'],
            'format' => ['required', 'string', Rule::in(['csv', 'json'])],
            'download' => ['nullable'],
        ];
    }

    public function messages()
    {
        return [
            'format.in' => "Invalid format specified! Accepted formats are 'csv' and 'json'",
        ];
    }
}
