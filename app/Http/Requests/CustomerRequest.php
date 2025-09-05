<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerRequest extends FormRequest
{
    public function authorize()
    {
        return true; // set to true or add auth logic
    }

    public function rules()
    {
        $customerId = $this->route('customer') ? $this->route('customer')->id : null;

        return [
            'name'    => ['required','string','max:120'],
            'email'   => ['nullable','email', Rule::unique('customers','email')->ignore($customerId)],
            'phone'   => ['nullable','string','max:30'],
            'address' => ['nullable','string'],
            'dob'     => ['nullable','date'],
            'notes'   => ['nullable','string'],
        ];
    }
}
