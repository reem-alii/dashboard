<?php

namespace App\Http\Requests\Website\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        
        //$user_id = $this->input('user_id');
        switch($this->method()){
            // Update User Profile
            case 'PUT':
               $user_id = auth()->user()->id;
               return [
                      'first_name'   => 'required',
                      'last_name'    => 'required',
                      'image'        => 'sometimes|image|mimes:jpg,jpeg,png,gif|max:2048',
                      'email'        => 'required|email|unique:users,email,'.$user_id,
                      'password'     => 'required|current_password:web',
                      'age'          => 'required|numeric|min:1',
                      'address'      => 'required',
                      'national_id'  => 'required|numeric|digits:14|unique:users,national_id,'.$user_id,
                      'new_password' => 'sometimes|different:password',
                ];
            break;
        // Register User
            case 'POST':
                return [
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'email' => 'required|email|unique:users,email|confirmed',
                    'email_confirmation' => 'required|email',
                    'password' => 'required|min:6|confirmed',
                ];
            break;
        }
    }
    public function messages()
    {
       return [
           'new_password.regex' => 'The new password must be at least 6 characters long, include one letter, one number, and one special character (e.g., !, $, #, %, @).',
           'password.regex' => 'The password must be at least 6 characters long, include one letter, one number, and one special character (e.g., !, $, #, %, @).',
       ];
    }
}
