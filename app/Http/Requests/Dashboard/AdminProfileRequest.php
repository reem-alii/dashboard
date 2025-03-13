<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class AdminProfileRequest extends FormRequest
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
        $admin_id = auth('admin')->user()->id;
        return [
            
            'first_name'   => 'required',
            'last_name'    => 'required',
            'image'        => 'sometimes|image|mimes:jpg,jpeg,png,gif|max:2048',
            'email'        => 'required|email|unique:users,email|unique:admins,email,'.$admin_id,
            'phone'        => 'required|regex:/(01)[0-9]{9}/|unique:admins,phone',
            //'phone'      => 'required|phone:EG', --> need to download package
            'password'     => 'required|current_password:admin',
            'new_password' => 'sometimes|min:6|different:password|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[!$#%@]).*$/',
        ];
    }
    public function messages()
    {
       return [
           'new_password.regex' => 'The new password must be at least 6 characters long, include one letter, one number, and one special character (e.g., !, $, #, %, @).',
       ];
    }
}
