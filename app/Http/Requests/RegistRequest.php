<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegistRequest extends Request
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
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'nim' => 'required',
            'password' => 'required',
            'level' => 'required'

        ];
    }

    public function messages(){
        return [
        'name.required' => 'nama harus diisi',
        'email.required' => 'email harus diisi',
        'username.required' => 'username harus diisi',
        'nim.required' => 'nim harus diisi',
        'password.required' => 'password harus diisi',
        'level.required' => 'jabatan harus diisi'

        ];
    }
}
