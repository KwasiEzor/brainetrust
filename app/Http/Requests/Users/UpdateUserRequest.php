<?php

namespace App\Http\Requests\Users;

use App\Rules\UpdateUserRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;

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
            'email' => [
                    'required',
                    'email',
                Rule::unique('users')->ignore(auth()->user()),
                ],
            'current_password'=>['required', new UpdateUserRule()],
            'password'=>['required',Password::defaults(),'confirmed']
        ];
    }
}
