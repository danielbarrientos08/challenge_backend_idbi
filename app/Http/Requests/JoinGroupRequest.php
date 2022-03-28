<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\NotInGroup;
use Illuminate\Validation\Rules\NotIn;

class JoinGroupRequest extends FormRequest
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
            'group_id' =>['required', new NotInGroup]
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'group_id' => $this->route('id'),
        ]);
    }
}
