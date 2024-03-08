<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                !$this->user ? Rule::unique('users') : Rule::unique('users')->ignoreModel($this->user),
            ],
            'password' => [
                Rule::requiredIf(!$this->user),
                'min:8',
                'confirmed'
            ],
        ];
    }
}
