<?php

namespace App\Http\Requests\API;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name'=>'sometimes|string|max:255',
            'email'=>'sometimes|email|max:255|unique:users,'.$this->id,
            'password'=>['sometimes',Password::defaults()]
        ];
    }
}
