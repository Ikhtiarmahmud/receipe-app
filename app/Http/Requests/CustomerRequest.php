<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            'name' => 'required|string|max:255',
            'image' => 'required_without:_method|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers,id',
            'address' => 'required|string|max:255',
            'age' => 'required|integer|max:255',
            'blood_group' => 'required|string|max:255',
        ];
    }
}
