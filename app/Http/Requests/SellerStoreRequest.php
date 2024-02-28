<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellerStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'seller_id'  => 'required',
            'country_id'  => 'required',
            'province_id'  => 'required',
            'city_id'  => 'required',
            'area_id'  => 'required',
            'shope_name'  => 'required:max250',
        ];
    }
}
