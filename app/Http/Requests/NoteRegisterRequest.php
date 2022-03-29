<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use App\Models\GroupUser;
use Illuminate\Support\Facades\Auth;

class NoteRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $group_users = GroupUser::where('user_id',Auth::user()->id)->where('group_id',$this->group_id)->first();

        if($group_users){
            return true;
        }
        else{
            return false;
        }

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=> ['bail','required','max:200'],
            'description'=> ['bail','required','min:10'],
            'group_id'=> ['bail','required','exists:groups,id'],
            'images.*'=> [ 'bail','sometimes','nullable','image','max:2048'],

        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'title' => Str::title($this->title),
            'description' => Str::ucfirst($this->description),
        ]);
    }
}
