<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCourseRequest extends FormRequest
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
            'course_description' => 'required|string',
            'cost' => 'required|integer|digits_between:0,5',
            'avatar' => 'image|max:20000|dimensions:min_height=300,ratio=1/1',
            'cover' => 'image|max:20000|dimensions:min_height=350',
            'category_id' => 'required|integer',
            'content_type.*' => 'required|integer|between:0,3',
            'title.*' => 'required|string|max:255',
            'description.*' => 'required|string'
        ];
    }
}
