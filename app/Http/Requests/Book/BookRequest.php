<?php

namespace App\Http\Requests\Book;

use App\Traits\FailedValidationRequest;
use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title' => 'string|required',
            'description' => 'string|required',
            'author' => 'string|required',
            'quantity' => 'integer|required',
            'price' => 'numeric|required'
        ];
    }
}
