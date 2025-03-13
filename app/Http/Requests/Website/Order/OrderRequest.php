<?php

namespace App\Http\Requests\Website\Order;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'full_name' => 'required|min:4',
            'email' => 'required|email',
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'address' => 'required|min:10',
        ];
    }
}
