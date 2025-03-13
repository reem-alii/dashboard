<?php

namespace App\Http\Requests\Dashboard\CRUD;

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
        //dd($this->method());
        //dd($this->route('id'));
        $user_id = $this->input('user_id'); 
        //dd($_SERVER['REQUEST_METHOD']);
        //dd($this->_method);   فيه طريقة تانية للكتابة 
        //$_POST['_method']; هي دي
        switch($this->method())
        {    
            // User Update
            case 'PUT':
            return [
                'first_name'   => 'required',
                'last_name'    => 'required',
                'image'        => 'sometimes|image|mimes:jpg,jpeg,png,gif|max:2048',
                // 'email'        => [
                //                     'required',
                //                     'email',    
                //                     Rule::unique('users')->ignore($user_id),
                //                     Rule::unique('admins'),
                //                   ],
                'email'        => 'required|email|unique:admins,email|unique:users,email,'.$user_id ,                  
                'age'          => 'required|numeric|min:1',
                'address'      => 'required',
                'national_id'  => 'required|numeric|digits:14|unique:users,national_id,'.$user_id ,
                // 'national_id'  => ['required',
                //                    'numeric',
                //                    'digits:14',
                //                    Rule::unique('users')->ignore($user_id),
                //                 ],
                'new_password' => 'sometimes|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[!$#%@]).*$/',
            ];
        break;
              
            // User create

        case 'POST':
            return [
                'first_name'   => 'required',
                'last_name'    => 'required',
                'email'        => 'required|email|unique:admins,email|unique:users,email',                  
                'password'     => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[!$#%@]).*$/',
                'age'          => 'required|numeric|min:1',
                'address'      => 'required',
                'national_id'  => 'required|numeric|digits:14|unique:users,national_id',
                'image'        => 'sometimes|image|mimes:jpg,jpeg,png,gif|max:2048',
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
