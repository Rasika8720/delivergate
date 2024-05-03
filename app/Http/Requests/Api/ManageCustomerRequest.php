<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ManageCustomerRequest extends FormRequest
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
            'name' =>'required|min:3',
            'email' => 'required|min:0|nullable',
            'phone' =>'required|numeric|digits:10',
            'address' =>'required',
            'history' => 'regex:/([- ,\/0-9a-zA-Z]+)/',
        ];
    }
}
