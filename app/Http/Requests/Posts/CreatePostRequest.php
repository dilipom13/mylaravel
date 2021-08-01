<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            //
            'title' => 'required|unique:posts',
            'description' => 'required',
            //'image' => 'required|image',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            'content' => 'required',
            'category' => 'required'
        ];
    }
}
