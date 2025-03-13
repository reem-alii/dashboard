<?php

namespace App\Http\Requests\Dashboard\CRUD;

use Illuminate\Foundation\Http\FormRequest;

class CatRequest extends FormRequest
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
            switch($this->method()){
                //Create Category
                case 'POST':
                   return [
                    'name.en'        => 'required|regex:/^[A-Za-z0-9 ]+$/',
                    'name.ar'        => 'required|regex:/^[\p{Arabic}\s\p{N}]+$/u',
                    'description.en' => 'required|regex:/^[A-Za-z0-9 ]+$/',
                    'description.ar' => 'required|regex:/^[\p{Arabic}\s\p{N}]+$/u',
                    'allow_ads'       =>'required',         
                   ];
                   break;
                case 'PUT':
                    //Update Category
                    return[
                        'name'         => 'required',
                        'description'  => 'required',
                        'allow_ads'       =>'required',         
                    ];
                    break;
            }
    }
    
}
