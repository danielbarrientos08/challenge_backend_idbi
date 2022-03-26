<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoteRegisterRequest extends FormRequest
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
            'title'=> ['required','max:200'],
            'description'=> ['required'],
            'group_id'=> ['required','exists:groups,id'],
            'images.*'=> [ 'bail','sometimes','nullable','image','max:2048'],

        ];
    }
}
