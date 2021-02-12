<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkRequest extends FormRequest
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
            'title'       => 'sometimes|required|unique:users,name,{$this->user->id}',
            'thumbnail'  => 'sometimes|required',
            'synopsis'  => 'sometimes|required',
            'description'  => 'sometimes|required',
            'release_date'  => 'sometimes|required'
        ];
    }
}
