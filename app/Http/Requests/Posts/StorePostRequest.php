<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'title'=>'required|string|max:255|unique:posts',
            'subtitle'=>'string|max:255',
            'excerpt'=>'string|max:255',
            'content'=>'required|string',
            'cover_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:1025',
            'tags*'=>'string|exists:tags,id|min:2|max:15',
            'category_id'=>'required|exists:categories,id',
            'user_id'=>'required|exists:users,id',
            'is_published'=>'nullable|boolean',
            'is_highlighted'=>'nullable|boolean',
            'views'=>'integer',
            'source'=>'nullable|string'
        ];
    }
}
