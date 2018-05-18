<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createTaskRequest extends FormRequest
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
//            'elements' => 'required',
//            'aud' => 'required',
//            'created_user' => 'required',
//            'description' => 'required'
        ];
    }
}
