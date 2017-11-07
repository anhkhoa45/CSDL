<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'DOB' => 'date_format:"Y-m-d"',
            'address' => 'string|max:255',
            'balance' => 'string|max:255',
            'gender' => 'string|max:10',
            'avatar' => 'image|max:10000'
        ];
    }
}
