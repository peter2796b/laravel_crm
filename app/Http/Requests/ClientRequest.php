<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'avatar' => 'required|dimensions:min_width=100,min_height=100'
        ];
    }

    public function messages()
    {
        return [
            'avatar.dimensions' => 'Minimum dimensions needed are 100 X 100'
        ];
    }
}
