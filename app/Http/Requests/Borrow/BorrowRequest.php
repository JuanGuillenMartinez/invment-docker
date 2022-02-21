<?php

namespace App\Http\Requests\Borrow;

use Illuminate\Foundation\Http\FormRequest;

class BorrowRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customer_id' => 'required|integer|numeric',
            'price' => 'required|integer|numeric',
            'discount' => 'required|integer|numeric|min:0|max:100',
            'final_price' => 'required|integer|numeric'
        ];
    }
}
