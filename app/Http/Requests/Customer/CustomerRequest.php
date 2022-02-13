<?php

namespace App\Http\Requests\Customer;

use App\Traits\FailedValidationRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class CustomerRequest extends FormRequest
{
    use FailedValidationRequest;
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'string|required|string|max:90',
            'first_name' => 'string|required|string|max:90',
            'last_name' => 'string|required|string|max:90',
            'address' => 'string|required|string|max:150',
            'email' => 'email|required|string|max:150',
        ];
    }

    public function failedValidation(Validator $validator) {
        $this->failedValidationApi($validator);        
    }
}
