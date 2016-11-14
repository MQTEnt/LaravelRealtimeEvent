<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CateFormRequest extends Request
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
            'name' => 'required|min:5',
            'desc' => 'required|min:10'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Please fill name of category',
            'name.min' => 'Name of category has min 5 character',
            'desc.required' => 'Please fill description of category',
            'desc.min' => 'Description of category has min 5 character'
        ];
    }
}
