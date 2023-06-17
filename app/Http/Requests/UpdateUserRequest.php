<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
use Illuminate\Http\Request;
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

    protected function prepareForValidation()
    {
        parent::prepareForValidation();
        $this->merge([
            'id' => $this->id,
            'id_selected'=>$this->id
        ]);
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route('user');

        $rules =  [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required','unique:users,email,'.$id ],
            'type' => ['required', 'integer', 'min:1', 'max:10'],
        ];
        if(!empty(Request::input('password'))){
            $rules['password'] = ['string', 'min:6', 'confirmed'];
        }
        return $rules;
    }


}
