<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSellerRequest extends FormRequest
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
            'name' => 'required:max250',
            'shope_name'  => 'required:max250',
            'email'  => 'required:max250',
            'password' => 'required:max250',
            'confirm_password' => 'required:max250',
            'cnic_no' => 'required:max250',
            'bank_name' => 'required:max250',
            'account_title' => 'required:max250',
            'account_no' => 'required:max250',
            'delivery_type' => 'required:max250'
        ];
    }
}
