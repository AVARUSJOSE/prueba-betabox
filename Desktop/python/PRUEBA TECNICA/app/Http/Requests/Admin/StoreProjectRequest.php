<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProjectRequest extends FormRequest
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
            'images' => [
                Rule::requiredIf(!$this->project),
                'array',
                'min:1',
            ],
            'image.*' => 'required|image|max:2048',
            'category_id' => 'nullable|exists:categories,id',
            'name' => 'required|max:255',
            'description' => 'required',
            'location' => 'required|max:255',
            'client' => 'required|max:255',
            'value' => 'required|numeric',
            'start_time' => 'required|date_format:d/m/Y',
            'end_time' => 'required|date_format:d/m/Y|after:start_time',
        ];
    }
}
