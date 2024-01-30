<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CollectionRequest extends FormRequest
{public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => 'required'

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter the name!'
        ];
    }
}
