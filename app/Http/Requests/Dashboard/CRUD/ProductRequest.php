<?php

namespace App\Http\Requests\Dashboard\CRUD;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            // Product Create
            case 'POST':
               return [
                'name.en'        => 'required|regex:/^[A-Za-z0-9 ]+$/',
                'name.ar'        => 'required|regex:/^[\p{Arabic}\s\p{N}]+$/u',
                'price'          => 'required|numeric',
                'description.en' => 'required|regex:/^[A-Za-z0-9 ]+$/',
                'description.ar' => 'required|regex:/^[\p{Arabic}\s\p{N}]+$/u',
                'size'           => 'required',
                'color'          => 'required',
                'image'          => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'quantity'       =>'required|numeric',         
               ];
               break;
            case 'PUT':
                // Product Update
                return[
                    'name'         => 'required',
                    'price'        => 'required|numeric',
                    'description'  => 'required',
                    'size'         => 'required',
                    'color'        => 'required',
                    'image'        => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
                    'quantity'     =>'required|numeric',
                ];
                break;
            default:
            return [
                'name.en'        => 'required|regex:/^[A-Za-z0-9 ]+$/',
                'name.ar'        => 'required|regex:/^[\p{Arabic}\s\p{N}]+$/u',
                'price'          => 'required|numeric',
                'description.en' => 'required|regex:/^[A-Za-z0-9 ]+$/',
                'description.ar' => 'required|regex:/^[\p{Arabic}\s\p{N}]+$/u',
                'size'           => 'required',
                'color'          => 'required',
                'image'          => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'quantity'       =>'required|numeric',         
               ];
               break;
        }
    }
}
